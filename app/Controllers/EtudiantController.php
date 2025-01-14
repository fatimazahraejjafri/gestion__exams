<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\NoteModel;

class EtudiantController extends BaseController {
    public function getStudentsByFiliereAndModule($idFiliere, $idModule) {
        $userModel = new UserModel();
        $noteModel = new NoteModel();

        // Get students in the filiere
        $students = $userModel->where('id_filiere', $idFiliere)
                              ->where('id_role', 1) // Only students
                              ->findAll();

        // Fetch notes for each student in the specific module
        foreach ($students as &$student) {
            $note = $noteModel->where('id_user', $student['id_user'])
                              ->where('id_module', $idModule) // Filter by module
                              ->first();
            $student['grade'] = $note ? $note['grade'] : null; // Attach grade if exists
        }

        return $this->response->setJSON($students);
    }
}

?>