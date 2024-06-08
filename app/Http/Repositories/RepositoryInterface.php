<?php

namespace App\Http\Repositories;

interface RepositoryInterface
{
    public function getAll();

    public function getAllWithRelations($relations = []);

    public function getWithRelationId($id, $relations = []);

    public function getPaginate($perPage);

    public function findOrFail($id);

    public function create($attributes = []);

    public function update($id, $attributes = []);

    public function delete($id);
}
