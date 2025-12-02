<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection
 */

// Route par defaut
$routes->get('/', 'ConnexionController::index');

// Connexion
$routes->get('connexion'      , 'ConnexionController::index'      );
$routes->get('deconnexion'    , 'ConnexionController::deconnexion');
$routes->match(['GET', 'POST'], 'ConnexionController/connexion', 'ConnexionController::connexion');

// Inscription
$routes->get('inscription'    , 'InscriptionController::index');
$routes->match(['GET', 'POST'], 'InscriptionController/enregistrer', 'InscriptionController::enregistrer');

// Mot de passe oublie
$routes->get('oublieMdp'      , 'OublieMdpController::index');
$routes->match(['GET', 'POST'], 'OublieMdpController/envoyerLienReinitialisation', 'OublieMdpController::envoyerLienReinitialisation');

// Reinitialisation mot de passe
$routes->get('reinitialiserMdp/(:segment)', 'ReinitialiserMdpController::index/$1');
$routes->match(['GET', 'POST']            , 'ReinitialiserMdpController/majMdp', 'ReinitialiserMdpController::majMdp');

// Accueil
$routes->get('accueil'  , 'AccueilController::index' , ['filter' => 'authGuard']);

// Utilisateur
$routes->get('profil'   , 'UtilisateurController::profil', ['filter' => 'authGuard']);
$routes->match(['GET', 'POST'], 'profil/edit', 'UtilisateurController::maj', ['filter' => 'authGuard']);
$routes->match(['POST', 'DELETE'], 'profil/delete', 'UtilisateurController::supprimer', ['filter' => 'authGuard']);