

# **Éloge du monde**

## **Site web e-commerce**

## Manuel d’Installation

SAE 5.01 Développement avancé

[**1\. Téléchargement du Projet	3**](#1.-téléchargement-du-projet)

[**2\. Configuration de l'environnement (fichier .env)	4**](#2.-configuration-de-l'environnement-\(fichier-.env\))

[**3\. Configuration des e-mails	5**](#3.-configuration-des-e-mails)

[**4\. Exécution du script de démarrage	6**](#4.-exécution-du-script-de-démarrage)

# 1\. Téléchargement du Projet {#1.-téléchargement-du-projet}

Vous aurez besoin de l’archive de l’application trouvable sur le GitHub officiel ou que l’on vous a envoyée par mail.

* **Action : télécharger** ou cloner le projet depuis l'adresse suivante si vous n’avez pas reçu par mail l’archive :  
  [https://github.com/Jujedie/SAE-5.01](https://github.com/Jujedie/SAE-5.01)

Figure 1 : Page GitHub officielle du projet

# 

# 2\. Configuration de l'environnement (fichier `.env`) {#2.-configuration-de-l'environnement-(fichier-.env)}

Une fois le projet téléchargé, le fichier de configuration de l'environnement doit être préparé.

* **Action :** **Renommer** le fichier `.env_default` en `.env`.  
* **Action :** **Ouvrir** le fichier `.env` et le **configurer**.  
  * Décommenter les variables d'environnement sur la figure ci-dessous, vous aurez besoin de modifier les variables suivantes :  
  * `CI_ENVIRONMENT`, `DB_HOSTNAME`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD,DB_DRIVER`, `DB_PORT`.

# 3\. Configuration des e-mails {#3.-configuration-des-e-mails}

Si vous souhaitez utiliser la fonctionnalité d'envoi d'e-mails de l'application, une étape de renommage et de configuration supplémentaire est nécessaire.

* **Action :** Si l'utilisation des e-mails est désirée, **renommer** le fichier `.Email` en `Email.php`.  
* **Action :** **Configurer** le fichier `Email.php` avec les paramètres de serveur de messagerie appropriés.

Figure 3 : Contenu du fichier Email.php avec les paramètres de serveur de messagerie

# 4\. Exécution du script de démarrage {#4.-exécution-du-script-de-démarrage}

La dernière étape consiste à exécuter le script de démarrage `setup.sh`.

* **Action :** **Ajouter** la permission d'exécution au script `setup.sh` :  
  chmod \+x ./setup.sh  
* **Action :** **Exécuter** le fichier `setup.sh` grâce à `bash` ou `sh` :  
  bash ./setup.sh  
  ou  
  sh ./setup.sh

Si une erreur se produit, essayez de vider votre base de données et d'exécuter de nouveau le script de démarrage.