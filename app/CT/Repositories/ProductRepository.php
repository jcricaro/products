<?php

namespace App\CT\Repositories;

interface ProductRepository
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data = []);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function store($id, $data = []);
}
