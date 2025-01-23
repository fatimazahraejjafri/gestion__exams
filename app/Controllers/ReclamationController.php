<?php

namespace App\Controllers;

use App\Models\ReclamationModel;
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

}
