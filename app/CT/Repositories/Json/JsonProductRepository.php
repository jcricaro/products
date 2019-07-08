<?php

namespace App\CT\Repositories\Json;


use App\CT\Repositories\ProductRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class JsonProductRepository implements ProductRepository
{
    /**
     * @return mixed
     */
    private function read()
    {
        $products = Storage::get('products.json');

        return collect(json_decode($products, true));
    }

    /**
     * @param Collection $products
     */
    private function save($products)
    {
        Storage::put('products.json', json_encode($products));
    }


    /**
     * @return mixed
     */
    public function all()
    {
        return $this->read()->sortByDesc('created_at')->values()->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        $products = $this->read();

        return $products->firstWhere('id', $id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {

    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data = [])
    {
        $products = $this->read();


    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function store($data = [])
    {
        $products = $this->read();

        $data['created_at'] = now()->format('Y-m-d H:i:s');

        $this->save($products->push($data)->all());

        return $data;
    }
}
