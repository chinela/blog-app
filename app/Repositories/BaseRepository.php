<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     *
     * @return Model
     */
    public function update($id, array $attributes)
    {
        $model = $this->find($id);
        $model->update($attributes);

        return $model;
    }

    /**
     * Retrieve a resource dynamically.
     *
     * @param string $data
     * @param string $column
     */
    public function getRecordByColumn($column, $data)
    {
        return $this->model::where($column, $data)->firstOrFail();
    }

    /**
     * Check the database model if a record exists.
     *
     * @param string $data
     * @param string $column
     *
     * @return Boolean
     */
    public function checkIfRecordExists($data, $column)
    {
        return $this->model::where($column, $data)->exists();
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * @return Collection
     */
    public function getLatest(): Collection
    {
        return $this->model->latest()->get();
    }

    public function getAllByOrder(string $column, string $direction = 'ASC')
    {
        return $this->model->orderBy($column, $direction)->get();
    }
}
