<?php
/**
 * Created by PhpStorm.
 * User: kelver
 * Date: 04/06/17
 * Time: 14:23
 */
declare(strict_types=1);

namespace PlantasBr\Repository;


interface RepositoryInterface
{
    public function all(): array;
    public function allComLimit(int $limit): array;
    public function allOutrasOpcoes(string $orderByCampo = '', string $orderBySort = '', int $limit = 0): array;
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function find(int $id, bool $failIfNotExist = true);
    public function findByField(string $field, $value);
}