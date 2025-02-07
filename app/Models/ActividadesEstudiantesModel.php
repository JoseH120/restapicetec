<?php

namespace App\Models;

use CodeIgniter\Model;

class ActividadesEstudiantesModel extends Model
{
    protected $table = 'actividades_estudiantes';
    protected $primaryKey = 'Idactividad_estudiante';
    protected $returnType = 'array';
    protected $allowedFields = ['Nota', 'UrlTarea', 'IdActividad', 'IdEstudiante'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $validationRules = [
        'Nota' => 'permit_empty|numeric|less_than[11]|greater_than[0]',
        'UrlTarea' => 'required|min_length[3]|max_length[600]',
        'IdActividad' => 'required|numeric|is_valid_actividad',
        'IdEstudiante' => 'required|numeric|is_valid_estudiante'
    ];

    protected $validationMessages = [
        'Nota' => [
            'numeric' => 'Debe ingresar un valor numerico',
            'less_than' => 'El numero debe ser menor o igual a 10',
            'greater_than' => 'El numero debe ser mayor o igual a 1'
        ],
        'UrlTarea' => [
            'required' => 'El valor es requerido',
            'min_length' => 'La URL debe ser mayor que 3 caracteres',
            'max_length' => 'La URL excede de 600 caracteres'
        ],
        'IdActividad' => [
            'required' => 'El valor es requerido',
            'numeric' => 'Debe ingresar un valor numerico',
            'is_valid_actividad' => 'el id actividad no existe'
        ],
        'IdEstudiante' => [
            'required' => 'El valor es requerido',
            'numeric' => 'Debe ingresar un valor numerico',
            'is_valid_actividad' => 'el id estudiante no existe'
        ]

    ];

    protected $skipValidation = false;
}
