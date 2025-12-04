<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection
 */

// Route par defaut
$routes->get('/', 'HomeController::index');

// Pages principales
$routes->get('blog'       , 'HomeController::blog'      );
$routes->get('reviews'    , 'ReviewController::index'   );
$routes->post('reviews'   , 'ReviewController::store'   );
$routes->get('createTrip' , 'HomeController::createTrip');

// Connexion
$routes->get('signin'                          , 'SigninController::index'  );
$routes->get('signout'                         , 'SigninController::signout');
$routes->match(['GET', 'POST'], 'signin/signin', 'SigninController::signin' );

// Inscription
$routes->get('signup'                            , 'SignupController::index'   );
$routes->match(['GET', 'POST'], 'signup/register', 'SignupController::register');

// Mot de passe oublie
$routes->get('forgotPassword'                                 , 'ForgotPasswordController::index'        );
$routes->match(['GET', 'POST'], 'forgotPassword/sendResetLink', 'ForgotPasswordController::sendResetLink');

// Reinitialisation mot de passe
$routes->get('resetPassword/(:segment)'                       , 'ResetPasswordController::index/$1'      );
$routes->match(['GET', 'POST'], 'resetPassword/updatePassword', 'ResetPasswordController::updatePassword');

// Utilisateur
$routes->get('profile'                                      , 'UserController::profile'         , ['filter' => 'authGuard']);
$routes->match(['GET', 'POST']   , 'profile/updateUser'     , 'UserController::updateUser'      , ['filter' => 'authGuard']);
$routes->match(['POST', 'DELETE'], 'profile/deleteUser'     , 'UserController::deleteUser'      , ['filter' => 'authGuard']);
$routes->match(['GET', 'POST']   , 'newsletter/toggle'      , 'UserController::toggleNewsletter', ['filter' => 'authGuard']);

// Admin
$routes->get('admin', 'AdminController::index', ['filter' => ['authGuard', 'roleGuard']]);

// Admin - Réservations
$routes->get('admin/bookings'              , 'AdminController::bookings'           , ['filter' => ['authGuard', 'roleGuard']]);
$routes->get('admin/bookings/(:num)/(:num)', 'AdminController::bookingDetail/$1/$2', ['filter' => ['authGuard', 'roleGuard']]);

// Admin - Utilisateurs
$routes->get('admin/users'                                      , 'AdminController::users'        , ['filter' => ['authGuard', 'roleGuard']]);
$routes->match(['GET', 'POST'], 'admin/users/edit/(:num)'       , 'AdminController::editUser/$1'  , ['filter' => ['authGuard', 'roleGuard']]);
$routes->post('admin/users/delete/(:num)'                       , 'AdminController::deleteUser/$1', ['filter' => ['authGuard', 'roleGuard']]);

// Admin - Destinations
$routes->get('admin/destinations'                               , 'AdminController::countries'        , ['filter' => ['authGuard', 'roleGuard']]);
$routes->match(['GET', 'POST'], 'admin/destinations/add'        , 'AdminController::addCountry'      , ['filter' => ['authGuard', 'roleGuard']]);
$routes->match(['GET', 'POST'], 'admin/destinations/edit/(:num)', 'AdminController::editCountry/$1'  , ['filter' => ['authGuard', 'roleGuard']]);
$routes->post('admin/destinations/delete/(:num)'                , 'AdminController::deleteCountry/$1', ['filter' => ['authGuard', 'roleGuard']]);

// Admin - Voyages
$routes->get('admin/trips'                                      , 'AdminController::trips'        , ['filter' => ['authGuard', 'roleGuard']]);
$routes->match(['GET', 'POST'], 'admin/trips/edit/(:num)'       , 'AdminController::editTrip/$1'  , ['filter' => ['authGuard', 'roleGuard']]);
$routes->post('admin/trips/delete/(:num)'                       , 'AdminController::deleteTrip/$1', ['filter' => ['authGuard', 'roleGuard']]);

// Admin - Témoignages
$routes->get('admin/reviews'               , 'AdminController::reviews'        , ['filter' => ['authGuard', 'roleGuard']]);
$routes->post('admin/reviews/verify/(:num)', 'AdminController::verifyReview/$1', ['filter' => ['authGuard', 'roleGuard']]);
$routes->post('admin/reviews/delete/(:num)', 'AdminController::deleteReview/$1', ['filter' => ['authGuard', 'roleGuard']]);

// Erreurs
$routes->get('error_403', 'HomeController::error403');