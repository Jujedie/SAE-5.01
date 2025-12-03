<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection
 */

// Route par defaut
$routes->get('/', 'HomeController::index');

// Pages principales
$routes->get('/blog', 'AccueilController::blog');

// Connexion
$routes->get('connexion'      , 'ConnexionController::index'      );
$routes->get('deconnexion'    , 'ConnexionController::deconnexion');
$routes->match(['GET', 'POST'], 'ConnexionController/connexion', 'ConnexionController::connexion');

// Inscription
$routes->get('inscription'    , 'InscriptionController::index');
$routes->match(['GET', 'POST'], 'inscription/enregistrer', 'InscriptionController::enregistrer');

// Mot de passe oublie
$routes->get('oublieMdp'      , 'OublieMdpController::index');
$routes->match(['GET', 'POST'], 'oublieMdp/envoyerLienReinitialisation', 'OublieMdpController::envoyerLienReinitialisation');

// Reinitialisation mot de passe
$routes->get('reinitialiserMdp/(:segment)', 'ReinitialiserMdpController::index/$1');
$routes->match(['GET', 'POST']            , 'reinitialiserMdp/majMdp', 'ReinitialiserMdpController::majMdp');

// Utilisateur
$routes->get('profil'   , 'UtilisateurController::profil', ['filter' => 'authGuard']);
$routes->match(['GET', 'POST'], 'profil/edit', 'UtilisateurController::maj', ['filter' => 'authGuard']);
$routes->match(['POST', 'DELETE'], 'profil/delete', 'UtilisateurController::supprimer', ['filter' => 'authGuard']);

// Admin
$routes->get('admin'           , 'AdminController::index'    , ['filter' => 'authGuard']);
$routes->get('admin/dashboard' , 'AdminController::dashboard', ['filter' => 'authGuard']);

// Admin - Réservations
$routes->get('admin/reservations'           , 'AdminController::reservations'      , ['filter' => 'authGuard']);
$routes->get('admin/reservations/(:num)/(:num)', 'AdminController::reservationDetail/$1/$2', ['filter' => 'authGuard']);

// Admin - Utilisateurs
$routes->get('admin/utilisateurs'           , 'AdminController::utilisateurs'     , ['filter' => 'authGuard']);
$routes->match(['GET', 'POST'], 'admin/utilisateurs/edit/(:num)', 'AdminController::utilisateurEdit/$1', ['filter' => 'authGuard']);
$routes->post('admin/utilisateurs/delete/(:num)', 'AdminController::utilisateurDelete/$1', ['filter' => 'authGuard']);

// Admin - Destinations
$routes->get('admin/destinations'           , 'AdminController::destinations'     , ['filter' => 'authGuard']);
$routes->match(['GET', 'POST'], 'admin/destinations/ajouter', 'AdminController::destinationAjouter', ['filter' => 'authGuard']);
$routes->match(['GET', 'POST'], 'admin/destinations/edit/(:num)', 'AdminController::destinationEdit/$1', ['filter' => 'authGuard']);
$routes->post('admin/destinations/delete/(:num)', 'AdminController::destinationDelete/$1', ['filter' => 'authGuard']);

// Admin - Voyages
$routes->get('admin/voyages'                , 'AdminController::voyages'          , ['filter' => 'authGuard']);
$routes->match(['GET', 'POST'], 'admin/voyages/edit/(:num)', 'AdminController::voyageEdit/$1', ['filter' => 'authGuard']);
$routes->post('admin/voyages/delete/(:num)', 'AdminController::voyageDelete/$1', ['filter' => 'authGuard']);

// Admin - Témoignages
$routes->get('admin/temoignages'            , 'AdminController::temoignages'      , ['filter' => 'authGuard']);
$routes->post('admin/temoignages/verifier/(:num)', 'AdminController::temoignageVerifier/$1', ['filter' => 'authGuard']);
$routes->post('admin/temoignages/delete/(:num)', 'AdminController::temoignageDelete/$1', ['filter' => 'authGuard']);
