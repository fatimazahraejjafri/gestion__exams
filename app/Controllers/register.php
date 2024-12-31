<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CompteModel;
use App\Models\UserModel;
use App\Models\RoleModel;

class register extends Controller
{
    public function index()
    {

        return view('register/signup');
    }

    

public function signup(){
    return view('register/signup');

}
     public function store()
    {
        helper(['form']);
        $session = session();
    
        $compteModel = new CompteModel();
        $userModel = new UserModel();
        $roleModel = new RoleModel();
    
        // Validation des champs
        $rules = [
            'email'    => 'required|valid_email|is_unique[compte.email]',
            'password' => 'required|min_length[6]',
        ];
    
        
        if ($this->validate($rules)) {
            // Récupérer les données du formulaire
            $email = $this->request->getPost('email');
            $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    
            // Vérifier si l'utilisateur ou le compte existe déjà
            $existingAccount = $compteModel->where('email', $email)->first();
    
            if ($existingAccount) {
                // Ajouter un message d'erreur dans la session avec le style
                $session->setFlashdata('error', 'Cet utilisateur existe déjà dans la base de données.');
                return redirect()->back()->withInput();
            }
    
            // Déterminer le rôle en fonction de l'e-mail
            if (strpos($email, 'etudiant@') !== false) {
                $roleName = 'etudiant';
            } elseif (strpos($email, 'prof@') !== false) {
                $roleName = 'prof';
            } else {
                $roleName = 'autre';
            }
    
            // Gérer le rôle
            $existingRole = $roleModel->where('name', $roleName)->first();
            if (!$existingRole) {
                $roleId = $roleModel->insert(['name' => $roleName]);
            } else {
                $roleId = $existingRole['id_role'];
            }
    
            // Créer un nouvel utilisateur
            $userData = [
                'id_role' => $roleId,
            ];
            $userId = $userModel->insert($userData);
    
            // Créer un compte
            $compteData = [
                'email'    => $email,
                'password' => $password,
                'id_user'  => $userId,
            ];
            $compteModel->insert($compteData);
    
            $session->setFlashdata('success', 'Compte créé avec succès. Veuillez vous connecter.');
            return redirect()->to('login');
        } else {
            $data['validation'] = $this->validator;
            return view('register/signup', $data);
        }
    }
    
}