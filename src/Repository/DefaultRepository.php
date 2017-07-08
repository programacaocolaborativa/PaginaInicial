<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 04/06/17
 * Time: 14:30
 */
declare(strict_types=1);
namespace ProColab\Repository;

class DefaultRepository implements RepositoryInterface
{
    /**
     * @var string
     */
    private $modelClass;
    /**
     * @var Model Eloquent
     */
    private $model;

    /**
     * DefaultRepository constructor.
     */
    public function __construct(string $modelClass)
    {
        $this->modelClass = $modelClass;
        $this->model = new $modelClass;
    }

    public function all(): array
    {
        return $this->model->all()->toArray();
    }

    public function allComLimit(int $limit): array
    {
        return $this->model->all()
            ->take($limit)
            ->toArray();
    }

    public function allOutrasOpcoes(string $orderByCampo = 'id', string $orderBySort = 'asc', int $limit = 0): array
    {
        ($orderBySort == 'desc') ?
            $orderBySort = 'sortByDesc' : $orderBySort = 'sortBy';


        return $this->model->all()
            ->$orderBySort($orderByCampo)
            ->take($limit)
            ->toArray();
    }

    public function create(array $data)
    {
        $this->model->fill($data);
        $this->model->save();
        return $this->model;
    }

    public function update(int $id, array $data)
    {
        $model = $this->find($id);
        $model->fill($data);
        $model->save();
        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->find($id);
        $model->delete();
    }

    public function find(int $id, bool $failIfNotExist = true)
    {
        return $failIfNotExist ? $this->model->findOrFail($id) :
            $this->model->find($id);
    }

    public function findByField(string $field, $value)
    {
        return $this->model->where($field, '=', $value)->get();
    }

    public function findOneBy(array $search)
    {
        $queryBuilder = $this->model;
        foreach ($search as $field => $value) {
            $queryBuilder = $queryBuilder->where($field, '=', $value);
        }
        return $queryBuilder->firstOrFail();
    }
}