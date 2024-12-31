<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CompteModel;
use App\Models\RoleModel;

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


        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');


        $user = $model->where('email', $email)->first();

        if ($user) {

            if (password_verify($password, $user['password'])) {
                // Retrieve role information
                $role = $roleModel->find($user['id_user']);


                $sessionData = [
                    'id'        => $user['id_compte'],
                    'email'     => $user['email'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
                $session->setFlashdata('success', 'Connexion réussie.');


                // Redirect based on role
                if ($role['name'] === 'prof') {
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/etudiant');
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

        return view('dashboard'); // Replace with the actual view file for the professor dashboard
    }

    public function etudiant()
    {
        if (!session()->get('logged_in') || session()->get('role') !== 'etudiant') {
            return redirect()->to('/login');
        }

        return view('etudiant'); // Replace with the actual view file for the student dashboard
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
