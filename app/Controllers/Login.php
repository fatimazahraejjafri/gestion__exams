<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CompteModel;

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


        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');


        $user = $model->where('email', $email)->first();

        if ($user) {

            if (password_verify($password, $user['password'])) {

                $sessionData = [
                    'id'        => $user['id_compte'],
                    'email'     => $user['email'],
                    'logged_in' => true
                ];
                $session->set($sessionData);
                $session->setFlashdata('success', 'Connexion réussie.');


                return redirect()->to('/dashboard');
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

        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        return view('auth/dashboard');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
