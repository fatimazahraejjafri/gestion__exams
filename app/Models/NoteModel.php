<?php

namespace App\Models;

use CodeIgniter\Model;




class NoteModel extends Model
{
    protected $table = 'note';
    protected $primaryKey = 'id_note';
    protected $allowedFields = ['id_module', 'id_user', 'grade'];

    public function saveNote($moduleId, $studentId, $grade)
{
    $existing = $this->where(['id_module' => $moduleId, 'id_user' => $studentId])->first();

    if ($existing) {
        // Update the grade if it already exists
        $this->update($existing['id_note'], ['grade' => $grade]);
    } else {
        // Insert a new grade entry
        $this->insert([
            'id_module' => $moduleId,
            'id_user' => $studentId,
            'grade' => $grade
        ]);
    }
}

public function saveNotesBulk($moduleId, $grades)
{
    foreach ($grades as $grade) {
        $existing = $this->where(['id_module' => $moduleId, 'id_user' => $grade['studentId']])->first();
        if ($existing) {
            $this->update($existing['id_note'], ['grade' => $grade['grade']]);
        } else {
            $this->insert([
                'id_module' => $moduleId,
                'id_user' => $grade['studentId'],
                'grade' => $grade['grade']
            ]);
        }
    }
}

public function getGradesAndModulesByFiliere($filiereId, $studentId)
    {
        return $this->db->table('module')
            ->select('module.name as module_name, note.grade')
            ->join('note', 'note.id_module = module.id_module AND note.id_user = ' . $studentId, 'left') // Left join to include modules without grades
            ->where('module.id_filiere', $filiereId)
            ->get()
            ->getResultArray();
    }


}