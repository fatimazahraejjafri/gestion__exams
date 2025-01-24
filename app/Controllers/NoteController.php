<?php

namespace App\Controllers;

use App\Models\NoteModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;

class NoteController extends Controller
{
    protected $noteModel;

    public function __construct()
    {
        $this->noteModel = new NoteModel();
    }
    public function showStudentGradesView()
    {
        $session = session();

        // Ensure student is logged in
        if (!$session->get('logged_in') || $session->get('role') !== 'etudiant') {
            return redirect()->to('/login');
        }

        // Get student information
        $studentId = $session->get('user_id');
        $filiereId = $session->get('id_filiere');

        // Fetch grades and modules
        $gradesAndModules = $this->noteModel->getGradesAndModulesByFiliere($filiereId, $studentId);

        // Fetch student details
        $userModel = new UserModel();
        $student = $userModel->find($studentId);

        return view('etudiant', [
            'gradesAndModules' => $gradesAndModules,
            'student' => $student
        ]);
    }
    


    public function insertGrades()
    {
        $moduleId = $this->request->getPost('id_module');
        $grades = json_decode($this->request->getPost('grades'), true); // Décoder le JSON

        if (!$moduleId || empty($grades)) {
            return $this->response->setJSON(['error' => 'Données invalides.']);
        }

        // Insertion des notes
        foreach ($grades as $gradeData) {
            $studentId = $gradeData['id_user'];
            $grade = $gradeData['grade'];

            $existing = $this->noteModel->where(['id_module' => $moduleId, 'id_user' => $studentId])->first();
            if ($existing) {
                // Mettre à jour la note existante
                $this->noteModel->update($existing['id_note'], ['grade' => $grade]);
            } else {
                // Insérer une nouvelle note
                $this->noteModel->insert([
                    'id_module' => $moduleId,
                    'id_user' => $studentId,
                    'grade' => $grade
                ]);
            }
        }

        return $this->response->setJSON(['success' => 'Notes enregistrées avec succès.']);
    }
      // Fonction pour insérer les notes depuis un fichier Excel
      public function insertGradesFromExcel()
      {
          
  
          $file = $this->request->getFile('grades_file');
  
          if (!$file->isValid()) {
              return $this->response->setJSON(['error' => 'Fichier invalide ou introuvable.']);
          }
  
          try {
              // Charger le fichier Excel
              $spreadsheet = IOFactory::load($file->getTempName());
              $worksheet = $spreadsheet->getActiveSheet();
  
              // Parcourir les lignes du fichier Excel
              $moduleId = $this->request->getPost('id_module');
              if (!$moduleId) {
                  return $this->response->setJSON(['error' => 'ID du module manquant.']);
              }
  
              $data = [];
              foreach ($worksheet->getRowIterator(2) as $row) { // Commence à la ligne 2 (en supposant une ligne d'en-tête)
                  $cellIterator = $row->getCellIterator();
                  $cellIterator->setIterateOnlyExistingCells(false);
  
                  $rowData = [];
                  foreach ($cellIterator as $cell) {
                      $rowData[] = $cell->getValue();
                  }
  
                  // Assurez-vous que le fichier a les colonnes attendues
                  if (count($rowData) >= 3) {
                      $studentId = $rowData[0]; // Première colonne : ID étudiant
                      $grade = $rowData[2];    // Troisième colonne : Note
                      $data[] = ['id_user' => $studentId, 'grade' => $grade];
                  }
              }
  
              // Traiter les données pour chaque étudiant
              foreach ($data as $gradeData) {
                  $studentId = $gradeData['id_user'];
                  $grade = $gradeData['grade'];
  
                  $existing = $this->noteModel->where(['id_module' => $moduleId, 'id_user' => $studentId])->first();
                  if ($existing) {
                      // Mettre à jour la note existante
                      $this->noteModel->update($existing['id_note'], ['grade' => $grade]);
                  } else {
                      // Insérer une nouvelle note
                      $this->noteModel->insert([
                          'id_module' => $moduleId,
                          'id_user' => $studentId,
                          'grade' => $grade,
                      ]);
                  }
              }
  
              session()->setFlashdata('success', 'Notes importées avec succès.');
        return redirect()->back();
    } catch (\Exception $e) {
        session()->setFlashdata('error', 'Erreur lors de la lecture du fichier Excel : ' . $e->getMessage());
        return redirect()->back();
    }
}
}
