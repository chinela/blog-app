<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    /**
     * @return Model
     */
    public function create(array $attributes);

    /**
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model;

    /**
     * @param $id
     *
     * @return Model
     */
    public function update($id, array $attributes);

    public function all();

    public function getAllByOrder(string $column, string $direction = 'ASC');
}
