<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{

    //Tipo = [ÄDMINISTRADOR => 1, TUTOR => 2, ESTUDIANTE => 3]

    protected $table = 'usuarios';
    protected $primaryKey = 'IdUsuario';
    protected $returnType = 'array';
    protected $allowedFields = ['Usuario', 'email', 'clave'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $skipValidation = false;

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    // protected $validationRules = [
    //     "Usuario" => 'required|max_length[30]',
    //     "Clave" => 'required|max_length[255]|min_length[10]',
    //     "Tipo" => 'required',
    // ];
    // protected $validationMessages = [
    //     'Usuario' => [
    //         'required' => 'El valor es requerido',
    //         'max_length' => 'Debe tener 30 caracteres como maximo'
    //     ],
    //     'Clave' => [
    //         'required' => 'El valor es requerido',
    //         'min_length' => 'Debe contener al menos 8 caracteres',
    //         'max_length' => 'Debe contener menos que 255 caracteres'
    //     ],
    //     'Tipo' => [
    //         'required' => 'El valor es requerido'
    //     ]
    // ];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['clave'])) {
            $data['data']['clave'] = password_hash($data['data']['clave'], PASSWORD_DEFAULT);
        }
        return $data;
    }
}
