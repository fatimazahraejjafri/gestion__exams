<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'register::signup');

$routes->get('register', 'register::index');
$routes->post('register', 'register::store');

$routes->get('login', 'Login::index');
$routes->post('login', 'Login::auth');

// Dashboard routes
$routes->get('dashbord', 'Login::dashboard'); // Displays the professor dashboard
$routes->get('etudiant', 'Login::etudiant'); // Displays the student dashboard

<<<<<<< HEAD
$routes->get('filiere/getFilieresByProf/(:num)', 'FiliereController::getFilieresByProf/$1');
$routes->get('module/getModulesByFiliereAndProf/(:num)/(:num)', 'ModuleController::getModulesByFiliereAndProf/$1/$2');
$routes->get('etudiant/getStudentsByFiliere/(:num)', 'EtudiantController::getStudentsByFiliere/$1');
$routes->get('etudiant/getStudentsByFiliereAndModule/(:num)/(:num)', 'EtudiantController::getStudentsByFiliereAndModule/$1/$2');
=======
$routes->get('logout', 'Login::logout');
$routes->get('reclamation', 'Login::reclamation'); // Displays the student dashboard
$routes->get('reclamation_prof', 'Login::reclamation_prof'); // Displays the student dashboard
>>>>>>> 7c236b7fda55bdae3d1a3b0af2c2e9a25443f416

$routes->post('insertGrades', 'NoteController::insertGrades');
$routes->post('importExcel', 'NoteController::insertGradesFromExcel');


$routes->get('login/logout', 'Login::logout');

$routes->get('/notes', 'NoteController::showStudentGradesView');
