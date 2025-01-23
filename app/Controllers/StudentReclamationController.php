<?php


namespace App\Controllers;

use App\Models\ReclamationModel;
use App\Models\UserModel;
use App\Models\ModuleModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\Files\UploadedFile;

class StudentReclamationController extends BaseController {
    protected $userModel;
    protected $moduleModel;
    protected $reclamationModel;

    public function __construct() {
        $this->userModel = new UserModel();
        $this->moduleModel = new ModuleModel();
        $this->reclamationModel = new ReclamationModel();
    }

    // Load Reclamation Form
    public function showReclamationForm()
{
    $session = session();

    if (!$session->get('logged_in') || $session->get('role') !== 'etudiant') {
        return redirect()->to('/login');
    }

    $studentId = $session->get('user_id');
    $idFiliere = $session->get('id_filiere'); // Get id_filiere from the session

    // Fetch student information
    $student = $this->userModel->find($studentId);

    if (!$student) {
        return redirect()->to('/login');
    }

    // Fetch filière name using id_filiere
    $filiereModel = new \App\Models\FiliereModel();
    $filiere = $filiereModel->find($idFiliere);

    // Debugging
    log_message('debug', 'Student Data: ' . print_r($student, true));
    log_message('debug', 'Filiere Data: ' . print_r($filiere, true));

    // Pass both student and filiere name to the view
    return view('reclamation', [
        'student' => $student,
        'filiere_name' => $filiere['name'] ?? 'Non défini' // Default to 'Non défini' if filière is missing
    ]);
}
    // Fetch modules for the student's filiere
    public function getModulesByFiliere()
{
    $session = session();
    $filiereId = $session->get('id_filiere'); // Ensure id_filiere exists in the session

    if (!$filiereId) {
        return $this->response->setJSON(['error' => 'Filière ID not found in session'])->setStatusCode(400);
    }

    $modules = $this->moduleModel->where('id_filiere', $filiereId)->findAll();
    return $this->response->setJSON($modules);
}


public function submitReclamation() {
    $filePath = null;

    // Handle file upload if a file is provided
    $file = $this->request->getFile('attachment');
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Generate a unique file name
        $filePath = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads/reclamations', $filePath); // Store the file in public/uploads/reclamations
    }

    // Prepare data for insertion
    $data = [
        'first_name' => $this->request->getPost('name'),
        'last_name' => $this->request->getPost('last_name'),
        'email' => $this->request->getPost('email'),
        'cne' => $this->request->getPost('CNE'),
        'filiere_name' => $this->request->getPost('Filiere_name'),
        'module_name' => $this->request->getPost('Module_name'),
        'attachment' => $filePath, // Store only the file name
        'description' => $this->request->getPost('reclamation'),
    ];

    // Insert the reclamation into the database
    if ($this->reclamationModel->insert($data)) {
        return redirect()->back()->with('success', 'Réclamation soumise avec succès.');
    } else {
        return redirect()->back()->with('error', 'Une erreur est survenue lors de la soumission de la réclamation.');
    }
}

}


?>