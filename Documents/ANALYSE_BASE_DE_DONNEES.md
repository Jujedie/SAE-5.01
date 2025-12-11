# Analyse de la Base de Données - SAE 5.01

**Date:** 11 décembre 2025  
**Analysé par:** GitHub Copilot  
**Statut:** Analyse critique de la structure actuelle

---

## 🔴 **PROBLÈME 1 : HÉRITAGE POSTGRESQL NON GÉRÉ PAR CODEIGNITER**

### Tables concernées
- `prebuilttrip`
- `extension`

### Description du problème
Les migrations utilisent `INHERITS (trip)` en SQL brut, mais les Models ne sont **PAS configurés pour gérer cet héritage**. Cela va créer des bugs majeurs :

- `PrebuiltTripModel` et `ExtensionModel` héritent des colonnes de `trip` (`idTrip`, `departureDate`, `type`, `idUser`)
- Les `allowedFields` dans les models incluent ces champs hérités **MAIS** CodeIgniter ne sait pas comment gérer l'héritage PostgreSQL
- **Conséquence**: Insertion/update vont échouer ou créer des incohérences

### Solution proposée
**Option 1 (Recommandée):** Abandonner l'héritage et dupliquer les colonnes dans chaque table
```php
// Migration PrebuiltTrip
$this->forge->addField([
    'idTrip' => [...],
    'departureDate' => [...],
    'type' => [...],
    'idUser' => [...],
    'title' => [...],
    // ... autres champs
]);
```

**Option 2:** Gérer manuellement l'insertion dans les deux tables (parent + enfant)

**Option 3:** Utiliser un vrai ORM avec support de l'héritage (Doctrine)

---

## 🔴 **PROBLÈME 2 : INCOHÉRENCE HOST <-> TRIP**

### Fichier concerné
`app/Database/Migrations/2025-11-07-110000_CreateTableHost.php`

### Description du problème
La table `host` a une clé étrangère sur `idTripStep` mais **PAS sur `idTrip`** !

```php
$this->forge->addForeignKey('idTripStep', 'tripStep', 'idTripStep', 'CASCADE', 'CASCADE');
// ❌ MANQUE: addForeignKey sur idTrip vers trip
```

### Conséquences
- Vous pouvez créer un `host` avec un `idTrip` qui n'existe pas
- Pas de cascade delete sur trip → les hosts restent orphelins
- Intégrité référentielle brisée

### Solution
Ajouter la contrainte de clé étrangère manquante :
```php
$this->forge->addForeignKey('idTrip', 'trip', 'idTrip', 'CASCADE', 'CASCADE');
```

---

## 🔴 **PROBLÈME 3 : BOOKING UTILISE idTripStep AU LIEU DE idTrip**

### Fichier concerné
`app/Models/TripModel.php` ligne 84

### Code problématique
```php
public function createTrip($dataTrip, $steps)
{
    $this->insert($dataTrip);
    $idTrip = $this->getInsertID();
    $bookingModel = new BookingModel();
    foreach ($steps as $step)
    {
        $bookingModel->addBooking($idTrip, $step['idTripStep']); // ❌ ERREUR
    }
    return $idTrip;
}
```

### Problème
- `addBooking($idTrip, $idUser)` attend `idTrip, idUser`
- Mais vous passez `idTrip, idTripStep` 
- La table `booking` a comme clé primaire `(idTrip, idUser)` pas `(idTrip, idTripStep)`

**La logique n'a AUCUN sens ici** - booking doit lier un utilisateur à un voyage, pas un voyage à une étape.

### Solution
Retirer cette boucle complètement ou créer une table de liaison `trip_has_tripstep` séparée si vous voulez lier des voyages à des étapes.

```php
public function createTrip($dataTrip, $steps)
{
    $this->insert($dataTrip);
    $idTrip = $this->getInsertID();
    
    // Utiliser host au lieu de booking pour lier trip et tripstep
    if (!empty($steps)) {
        $hostModel = new HostModel();
        foreach ($steps as $step) {
            $hostModel->insert([
                'idTrip' => $idTrip,
                'idTripStep' => $step['idTripStep'],
                'nbDays' => $step['nbDays'],
                'nbNights' => $step['nbNights'],
            ]);
        }
    }
    
    return $idTrip;
}
```

---

## 🟡 **PROBLÈME 4 : CLÉS PRIMAIRES COMPOSITES MAL GÉRÉES**

### Tables concernées
- `host`
- `booking`

### Description du problème
Ces tables ont des clés primaires composites mais CodeIgniter a du mal avec ça :

**HostModel:**
```php
protected $primaryKey = null; // ❌ Devrait être ['idTrip', 'idTripStep']
```

**BookingModel:**
```php
protected $primaryKey = ['idTrip', 'idUser']; // ✅ Correct mais...
```

### Conséquences
Les méthodes `find()`, `delete()`, `update()` ne fonctionneront **pas correctement** avec des clés composites. Vous êtes obligés d'utiliser `where()` partout.

### Solution
**Option 1 (Rapide):** Gardez-le comme ça mais documentez bien que `find($id)` ne marche pas.

**Option 2 (Recommandée):** Ajoutez un `id` auto-increment comme clé primaire unique :
```php
$this->forge->addField([
    'id' => [
        'type' => 'SERIAL',
        'auto_increment' => true,
    ],
    'idTrip' => [...],
    'idUser' => [...],
]);
$this->forge->addKey('id', true);
$this->forge->addUniqueKey(['idTrip', 'idUser']);
```

---

## 🟡 **PROBLÈME 5 : CONFIG DATABASE INCOHÉRENTE**

### Fichier concerné
`app/Config/Database.php`

### Code problématique
```php
'charset'  => 'utf8',           // ❌ PostgreSQL n'utilise pas utf8
'DBCollat' => 'utf8_general_ci' // ❌ Collation MySQL, pas PostgreSQL!
```

### Problème
PostgreSQL utilise `UTF8` ou `UTF-8` et n'a pas besoin de `DBCollat` comme MySQL.

### Solution
```php
'charset'  => 'UTF8',
'DBCollat' => '', // Vide pour PostgreSQL
```

---

## 🟡 **PROBLÈME 6 : QUERIES SQL BRUTES PARTOUT**

### Modèles concernés
- `HostModel`
- `TripStepModel`
- `BookingModel`

### Description du problème
Vous mélangez Query Builder et SQL brut, ce qui rend le code:
- Non portable entre bases de données
- Vulnérable aux injections SQL (même si vous utilisez des bindings)
- Difficile à maintenir

### Exemples problématiques
```php
// HostModel ligne 159
$db = \Config\Database::connect();
$query = $db->query('SELECT h.*, ts.name...', [$idTrip]);

// BookingModel ligne 67
$sql = "INSERT INTO booking (\"idTrip\", \"idUser\") VALUES (?, ?)";
return $this->db->query($sql, [$idTrip, $idUser]);
```

### Solution
Utilisez le Query Builder autant que possible:
```php
// Au lieu de SQL brut
$this->db->table('booking')->insert(['idTrip' => $idTrip, 'idUser' => $idUser]);

// Pour les jointures complexes
$this->db->table('host h')
    ->select('h.*, ts.name, ts.cost, ts.idCountry, c.name as country, c.continent')
    ->join('tripStep ts', 'ts.idTripStep = h.idTripStep')
    ->join('country c', 'c.idCountry = ts.idCountry', 'left')
    ->where('h.idTrip', $idTrip)
    ->orderBy('h.idTripStep', 'ASC')
    ->get()
    ->getResultArray();
```

---

## 🟡 **PROBLÈME 7 : GUILLEMETS DOUBLES DANS LES REQUÊTES**

### Description du problème
Partout dans votre code SQL, vous utilisez des guillemets doubles:
```sql
WHERE h."idTrip" = ?
```

C'est nécessaire en PostgreSQL **seulement** si vous avez créé les colonnes avec des noms en casse mixte (`camelCase`). Si vous utilisez tout en minuscules, pas besoin de guillemets.

### Impact
Code verbeux et difficile à lire. Mais si vous avez créé vos tables avec CodeIgniter, il a probablement mis tout en minuscules et vous n'en avez pas besoin.

### Recommandation
Vérifiez dans votre base de données si les colonnes sont réellement en camelCase ou tout en minuscules. Si elles sont en minuscules, retirez les guillemets doubles.

---

## 🟠 **PROBLÈME 8 : VALEURS BOOLÉENNES POSTGRESQL**

### Fichier concerné
`app/Models/UserModel.php` ligne 86

### Code problématique
```php
$builder->where('review.verified', 't'); // ❌ String 't' au lieu de true
```

### Problème
PostgreSQL stocke les booléens comme `true`/`false`, pas `'t'`/`'f'` (même si ça marche, c'est pas idiomatique).

### Solution
```php
$builder->where('review.verified', true);
```

### Fichiers à modifier
- `UserModel::getUsersByVerifiedReviews()`
- `ReviewModel::getAverageRating()`
- `ReviewModel::getVerifiedReviews()`
- `ReviewModel::getRecentReviews()`

---

## 🟠 **PROBLÈME 9 : PAS DE VALIDATION**

### Tous les modèles concernés
```php
protected $validationRules = []; // ❌ Vide partout!
```

### Problème
Aucun modèle ne valide les données avant insertion. Vous pouvez insérer n'importe quoi, y compris:
- Emails invalides
- Ratings de -1000 ou 9999
- Textes vides
- Types de voyage incorrects

### Solution
Ajoutez des règles de validation dans chaque modèle.

#### Exemple pour UserModel
```php
protected $validationRules = [
    'lastName' => 'required|min_length[2]|max_length[100]',
    'firstName' => 'required|min_length[2]|max_length[100]',
    'phone' => 'permit_empty|exact_length[10]|numeric',
    'email' => 'required|valid_email|is_unique[user.email,idUser,{idUser}]',
    'role' => 'required|in_list[admin,user,host]',
    'password' => 'required|min_length[8]',
    'isSubscribed' => 'permit_empty|in_list[0,1]',
];

protected $validationMessages = [
    'email' => [
        'is_unique' => 'Cet email est déjà utilisé.',
        'valid_email' => 'Email invalide.',
    ],
    'role' => [
        'in_list' => 'Le rôle doit être admin, user ou host.',
    ],
];
```

#### Exemple pour ReviewModel
```php
protected $validationRules = [
    'rating' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[5]',
    'content' => 'required|min_length[10]|max_length[1000]',
    'verified' => 'permit_empty|in_list[0,1]',
    'idUser' => 'required|integer|is_not_unique[user.idUser]',
];
```

---

## 🟠 **PROBLÈME 10 : DATE MANAGEMENT INCOHÉRENT**

### Fichier concerné
`app/Models/ReviewModel.php` ligne 83

### Code problématique
```php
public function addReview($data)
{
    // Ajouter la date actuelle si elle n'est pas fournie
    if (!isset($data['date'])) {
        $data['date'] = date('Y-m-d'); // ❌ Date sans heure pour un TIMESTAMP
    }
    return $this->insert($data);
}
```

### Problème
La colonne est `TIMESTAMP` mais vous insérez seulement la date. Ça va mettre l'heure à `00:00:00`.

Dans la migration:
```php
$this->db->query('ALTER TABLE review ALTER COLUMN date SET DEFAULT CURRENT_TIMESTAMP;');
```

Alors pourquoi gérer ça manuellement dans le model ? Laissez la BDD faire le travail.

### Solution
Retirez la gestion manuelle de la date :
```php
public function addReview($data)
{
    // La BDD gère automatiquement la date avec DEFAULT CURRENT_TIMESTAMP
    return $this->insert($data);
}
```

Ou si vous voulez vraiment gérer ça dans le code :
```php
if (!isset($data['date'])) {
    $data['date'] = date('Y-m-d H:i:s'); // Inclure l'heure
}
```

---

## 🔵 **PROBLÈME 11 : NOMMAGE INCOHÉRENT**

### Description du problème
- **Tables:** `tripStep` (camelCase) vs `blogPost` (camelCase) vs `prebuilttrip` (tout minuscule)
- **Colonnes:** `programDesc` vs `hostingdesc` vs `conditiondesc` (casse mixte!)
- **Models:** casse mixte partout

### Impact
PostgreSQL convertit tout en minuscules sauf si vous mettez des guillemets. Donc vos colonnes `programDesc` sont probablement devenues `programdesc` dans la BDD.

### Recommandation
Choisissez une convention et tenez-vous-y :
- **Option 1 (Recommandée pour PostgreSQL):** snake_case partout (`trip_step`, `program_desc`)
- **Option 2:** camelCase partout avec guillemets doubles dans toutes les requêtes

### Convention recommandée
```
Tables: snake_case (trip_step, blog_post, prebuilt_trip)
Colonnes: snake_case (program_desc, hosting_desc, condition_desc)
Clés étrangères: snake_case (id_user, id_trip, id_trip_step)
```

---

## 📊 **RÉSUMÉ DES ACTIONS PRIORITAIRES**

### 🔴 **URGENT - Bloquants**
1. **Fixer la clé étrangère manquante sur `host.idTrip`**
   - Créer une nouvelle migration pour ajouter la contrainte
   - Fichier: `2025-12-11-XXXXXX_AddForeignKeyHostTrip.php`

2. **Corriger la logique de `TripModel::createTrip()` avec booking**
   - Remplacer l'appel à `addBooking()` par la création de `host` si nécessaire
   - Ou retirer complètement cette logique

3. **Décider quoi faire avec l'héritage PostgreSQL (prebuilttrip/extension)**
   - Recommandation: Abandonner l'héritage et dupliquer les colonnes
   - Créer de nouvelles migrations pour restructurer ces tables

### 🟡 **IMPORTANT - À faire rapidement**
4. **Normaliser la config Database pour PostgreSQL**
   - Modifier `app/Config/Database.php`
   - Changer charset et retirer DBCollat

5. **Remplacer les SQL bruts par Query Builder**
   - Refactorer `HostModel`
   - Refactorer `TripStepModel`
   - Refactorer `BookingModel`

6. **Ajouter les règles de validation dans tous les modèles**
   - UserModel
   - ReviewModel
   - TripModel
   - PrebuiltTripModel
   - Tous les autres modèles

### 🟠 **AMÉLIORATION - À planifier**
7. **Standardiser le nommage**
   - Créer une migration pour renommer toutes les tables/colonnes en snake_case
   - Ou documenter clairement la convention actuelle

8. **Utiliser `true`/`false` au lieu de `'t'`/`'f'`**
   - Modifier tous les `where()` sur des colonnes booléennes

9. **Simplifier la gestion des dates**
   - Retirer la gestion manuelle dans ReviewModel
   - Ou ajouter l'heure complète

10. **Documenter le comportement des clés composites**
    - Ajouter des commentaires dans HostModel et BookingModel
    - Créer une documentation pour l'équipe

---

## 🎯 **PLAN D'ACTION RECOMMANDÉ**

### Phase 1 - Correction des bugs critiques (1-2 jours)
1. Créer migration pour FK `host.idTrip`
2. Corriger `TripModel::createTrip()`
3. Décider du sort de l'héritage PostgreSQL

### Phase 2 - Amélioration de la robustesse (3-5 jours)
4. Ajouter validation dans tous les modèles
5. Corriger config Database
6. Remplacer SQL bruts par Query Builder

### Phase 3 - Amélioration de la maintenabilité (optionnel)
7. Standardiser le nommage
8. Refactoriser le code booléen
9. Documenter les choix techniques

---

## 📝 **NOTES COMPLÉMENTAIRES**

### Points positifs observés
- Structure générale cohérente avec CodeIgniter 4
- Utilisation correcte des migrations
- Séparation claire entre models et controllers
- Utilisation de Query Builder dans certains endroits

### Points de vigilance
- L'héritage PostgreSQL est une fonctionnalité avancée rarement utilisée
- Les clés primaires composites sont complexes à gérer avec un ORM
- Le mélange SQL brut / Query Builder rend le code difficile à maintenir
- L'absence de validation expose l'application à des données corrompues

### Recommandations générales
- Tester chaque modification sur une base de données de développement
- Créer des tests unitaires pour les models
- Documenter les choix techniques (surtout pour l'héritage)
- Mettre en place une revue de code systématique

---

**Fin de l'analyse**
