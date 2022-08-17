<?php

namespace App\Repositories;

class BaseRepository
{
    protected $model;

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function getAll()
    {
        return $this->model->get();
    }
}
