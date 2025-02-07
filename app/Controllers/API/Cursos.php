<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CursosModel;
use Exception;

class Cursos extends ResourceController
{

    public function __construct()
    {
        $this->model = $this->setModel(new CursosModel());
    }

    public function index()
    {
        $cursos = $this->model->findAll();
        return $this->respond($cursos);
    }
    //Servicio para crear un registro
    public function create()
    {

        try {
            $cursos = $this->request->getJSON();
            if ($this->model->insert($cursos)) {
                $cursos->IdCurso = $this->model->insertID();
                return $this->respondCreated($cursos);
            } else {
                return $this->failValidationError($this->model->validation->listErrors());
            }
        } catch (Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor.');
        }
    }
    //Servicio para buscar un registro.
    public function edit($id = null)
    {
        try {
            if ($id == null) {
                return $this->failValidationError('No se ha enviado un ID valido.');
            }
            $curso = $this->model->find($id);
            return $curso == null ?
                $this->failNotFound("No se ha encontrado un registro con el ID: " . $id . " enviado.") :
                $this->respond($curso);
        } catch (Exception $e) {
            return $this->failServerError("Ha ocurrido un error en la peticion.");
        }
    }

    //Servicio de actualizar un registro
    public function update($id = null)
    {
        try {
            if ($id == null) {
                return $this->failValidationError("No se ha enviado un ID valido.");
            }
            $curso = $this->model->find($id);
            if ($curso == null) {
                return $this->failNotFound("No se ha encontrado un registro con el ID: " . $id . " enviado.");
            }

            $data = $this->request->getJSON();
            if ($this->model->update($id, $data)) {
                $data->IdCurso = $id;
                return $this->respondUpdated($data);
            } else {
                return $this->failValidationError($this->model->validation->listErrors());
            }
        } catch (Exception $e) {
            return $this->failServerError("Ha ocurrido un error en la peticion.");
        }
    }

    //Servicio para elimnar un registro
    public function delete($id = null)
    {
        try {
            $data = $this->model->find($id);
            if ($data == null) {
                return $this->failNotFound("No se ha encontrado un registro con el ID" . $id . " enviado.");
            }

            return $this->model->delete($id) ? $this->respondDeleted($data) : $this->failValidationError("No se ha podido eliminar el registro.");
        } catch (Exception $e) {
            return $this->failServerError("Ha ocurrido un error en el servidor.");
        }
    }

    //Listado de estudiantes del curso
    public function getListByCourse($id = null)
    {
        try {
            $modelCurso = new CursosModel();
            if ($id == null) {
                return $this->failValidationError('No se ha recibido un ID valido');
            }
            $curso = $modelCurso->find($id);
            if ($curso == null) {
                return $this->failNotFound('No se ha encontrado un curso con el Id: ' . $id);
            }

            $estudiantes = $this->model->listByCourse($id);

            return $this->respond($estudiantes);
        } catch (Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor' . $e->getMessage());
        }
    }

    //Tutor asignado al curso
    public function getTutor($id = null)
    {
        try {
            $modelCurso = new CursosModel();
            if ($id == null) {
                return $this->failValidationError('No se ha recibido un ID valido');
            }
            $curso = $modelCurso->find($id);
            if ($curso == null) {
                return $this->failNotFound('No se ha encontrado un curso con el Id: ' . $id);
            }

            $tutor = $this->model->tutor($id);

            return $this->respond($tutor);
        } catch (Exception $e) {
            return $this->failServerError('Ha ocurrido un error en el servidor' . $e->getMessage());
        }
    }
}
