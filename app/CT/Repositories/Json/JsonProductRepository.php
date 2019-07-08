<?php

namespace App\CT\Repositories\Json;


use App\CT\Repositories\ProductRepository;

abstract class JsonProductRepository implements ProductRepository
{

    /**
     * @return mixed
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data = [])
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function store($id, $data = [])
    {
        // TODO: Implement store() method.
    }
}
