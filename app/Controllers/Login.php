<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CompteModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use App\Models\FiliereModel;

class Login extends Controller
{
    public function index()
    {
        return view('login/login');
    }

    public function auth()
    {
        helper(['form']);
        $session = session();
        $model = new CompteModel();
        $roleModel = new RoleModel();
        $userModel = new UserModel();  // Add model to access the 'user' table


        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        // Get user from the 'compte' table based on email
        $user = $model->where('email', $email)->first();
    
        if ($user) {
            // Check if password is valid
            if (password_verify($password, $user['password'])) {
                // Get the id_user from 'compte' and use it to find the 'id_role' in 'user' table
                $userInfo = $userModel->where('id_user', $user['id_user'])->first();  // Get user info from the 'user' table
    
                if ($userInfo) {
                    // Retrieve the role ID from the 'user' table
                    $role = $roleModel->where('id_role', $userInfo['id_role'])->first();  // Look up role by id_role
    
                    if ($role) {
                        // Set session data including role information and user_id
                        $sessionData = [
                            'id'        => $user['id_compte'],
                            'email'     => $user['email'],
                            'role'      => $role['name'],  // Replace 'name' with the correct column name from the 'role' table
                            'user_id'   => $user['id_user'],  // Store user_id here to access it later
                            'id_filiere' => $userInfo['id_filiere'], // Add filiere info
                            'logged_in' => true
                        ];
                        $session->set($sessionData);
                        $session->setFlashdata('success', 'Connexion réussie.');
    
                        // Redirect based on role
                        if ($role['name'] === 'prof') {  // Replace 'name' with the correct column name
                            return redirect()->to('/dashbord');
                        } else {
                            return redirect()->to('/accueil');
                        }
                    } else {
                        $session->setFlashdata('error', 'Rôle utilisateur introuvable.');
                    }
                } else {
                    $session->setFlashdata('error', 'Utilisateur non trouvé dans la table des utilisateurs.');
                }
            } else {
                $session->setFlashdata('error', 'Email ou mot de passe invalide.');
            }
        } else {
            $session->setFlashdata('error', 'Utilisateur non trouvé.');
        }
    
        return redirect()->to('/login');
    }

    public function dashboard()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'prof') {
            return redirect()->to('/login');
        }

        // Retrieve professor's information from the user table using user_id
        $userModel = new UserModel();
        $professor = $userModel->where('id_user', session()->get('user_id'))->first();

        if (!$professor) {
            return redirect()->to('/login');
        }

        // Pass professor's information to the view
        return view('dashbord', ['professor' => $professor]);
    }

    public function etudiant()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'etudiant') {
            return redirect()->to('/login');
        }
    
        // Retrieve student information from the user table using user_id
        $userModel = new UserModel();
        $student = $userModel->where('id_user', session()->get('user_id'))->first();
    
        if (!$student) {
            return redirect()->to('/login');
        }
    
        // Pass student information to the view
        return view('dachboard_etudiant/accueil', ['student' => $student]);
    }
    
    public function reclamation()
{
    if (!session()->get('logged_in') || session()->get('role') !== 'etudiant') {
        return redirect()->to('/login');
    }

    // Retrieve student information from the user and compte tables
    $userModel = new UserModel();
    $compteModel = new CompteModel();
    $filiereModel = new FiliereModel(); // Load FiliereModel to fetch filière name

    // Get the student information from the user table
    $student = $userModel->where('id_user', session()->get('user_id'))->first();

    if (!$student) {
        return redirect()->to('/login');
    }

    // Fetch the email from the compte table using the id_user
    $compte = $compteModel->where('id_user', session()->get('user_id'))->first();

    if ($compte) {
        $student['email'] = $compte['email']; // Add the email to the student data
    } else {
        $student['email'] = ''; // If no email is found, set it to an empty string
    }

    // Fetch the filière name using id_filiere from the student data
    $filiere = $filiereModel->where('id_filiere', $student['id_filiere'])->first();

    if ($filiere) {
        $student['filiere_name'] = $filiere['name']; // Add the filière name to the student data
    } else {
        $student['filiere_name'] = 'Non défini'; // Set a default value if no filière is found
    }

    // Pass student information to the view
    return view('reclamation', ['student' => $student]);
}

    

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function reclamation_prof()
{
    $session = session();

    if (!$session->get('user_id') || $session->get('role') !== 'prof') {
        return redirect()->to('/login');
    }

    $professorId = $session->get('user_id'); 

    $reclamationModel = new \App\Models\ReclamationModel();
    $reclamations = $reclamationModel->getReclamationsByProfessorsAndModules($professorId);

    $session->set('reclamations', $reclamations);

    return view('reclamation_prof', ['reclamations' => $session->get('reclamations')]);
}


    public function accueil()
    {

        return view('accueil'); 
    }
}
