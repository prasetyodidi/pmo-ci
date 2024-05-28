<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Users extends ResourceController
{
    protected $modelName = 'App\Models\UsersModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $data = $this->model->findById($id);
        if ($data) {
            return $this->respond($data);
        }
        return $this->fail('id tidak ditemukan');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'register');
        $errors = $this->validation->getErrors();
        if ($errors) {
            return $this->fail($errors);
        }
        $user = new \App\Entities\Users();
        $user->fill($data);
        $user->created_by = 0;
        $user->created_date = date("Y-m-d H:i:s");
        if ($this->model->save($user)) {
            return $this->respondCreated($user, 'user created');
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        $data['id'] = $id;
        $validate = $this->validation->run($data, 'update_user');
        $errors = $this->validation->getErrors();
        if ($errors) {
            return $this->fail($errors);
        }
        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }
        $user = new \App\Entities\Users();
        $user->fill($data);
        $user->updated_by = 0;
        $user->updated_date = date("Y-m-d H:i:s");
        if ($this->model->save($user)) {
            return $this->respondUpdated($user, 'user updated');
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if (!$this->model->findById($id)) {
            return $this->fail('id tidak ditemukan');
        }
        if ($this->model->delete($id)) {
            return $this->respondDeleted(['id' => $id . ' Deleted']);
        }
    }
}
