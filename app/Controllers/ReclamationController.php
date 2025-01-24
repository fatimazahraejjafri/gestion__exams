<?php

namespace App\Controllers;

use App\Models\ReclamationModel;
use App\Models\CompteModel;
use CodeIgniter\Controller;

class ReclamationController extends Controller {
    protected $reclamationModel;

    public function __construct() {
        $this->reclamationModel = new ReclamationModel();
    }

    // Fetch reclamations for the professor
    public function getReclamationsByProfessorsAndModules() {
        $session = session();
    
        // Ensure professor is logged in
        if (!$session->get('user_id') || $session->get('role') !== 'prof') {
            return redirect()->to('/login');
        }
    
        $professorId = $session->get('user_id'); // Get professor's ID from the session
    
        // Fetch reclamations related to the professor
        $reclamations = $this->reclamationModel->getReclamationsByProfessorsAndModules($professorId);
    
        return view('reclamation_prof', ['reclamations' => $reclamations]);
    }
    

    // Update the status of a reclamation
    public function updateReclamationStatus($id) {
        $newStatus = $this->request->getPost('status');

        if (!in_array($newStatus, ['pending', 'resolved', 'rejected'])) {
            return redirect()->back()->with('error', 'Statut invalide.');
        }

        $this->reclamationModel->update($id, ['status' => $newStatus]);

        return redirect()->back()->with('success', 'Statut de la réclamation mis à jour.');
    }

    public function download($filename)
{
    $filePath = WRITEPATH . 'uploads/reclamations/' . $filename;

    if (file_exists($filePath)) {
        // Force download
        return $this->response->download($filePath, null);
    } else {
        // If the file doesn't exist, show an error or redirect
        return redirect()->back()->with('error', 'Fichier non trouvé.');
    }
}
public function getReclamationsByStudent() {
    $session = session();

    // Ensure student is logged in
    if (!$session->get('user_id') || $session->get('role') !== 'etudiant') {
        return redirect()->to('/login');
    }

    $studentId = $session->get('user_id'); // Get student's ID from the session

    // Load the UsersModel to fetch the email
    $usersModel = new CompteModel(); // Replace with the actual model name for your users table
    $user = $usersModel->find($studentId);

    if (!$user) {
        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }

    $email = $user['email']; // Retrieve the email from the user's record

    // Fetch reclamations related to the student using their email
    $reclamations = $this->reclamationModel->where('email', $email)->findAll();

    return view('reclamation_histo', ['reclamations' => $reclamations]);
}

}
