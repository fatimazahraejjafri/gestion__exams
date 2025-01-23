<?php

namespace App\Models;

use CodeIgniter\Model;

class ReclamationModel extends Model {
    protected $table = 'reclamation';
    protected $primaryKey = 'id_reclamation';
    protected $allowedFields = [
        'first_name', 'last_name', 'email', 'cne',
        'filiere_name', 'module_name', 'attachment',
        'description', 'status', 'created_at'
    ];

    public function getReclamationsByProfessorsAndModules($professorId)
    {
        return $this->select('reclamation.*, filiere.name as filiere_name, module.name as module_name')
                    ->join('module', 'module.name = reclamation.module_name')
                    ->join('filiere', 'filiere.name = reclamation.filiere_name')
                    ->where('module.id_user', $professorId)
                    ->findAll();
    }
    
    
    
    
}