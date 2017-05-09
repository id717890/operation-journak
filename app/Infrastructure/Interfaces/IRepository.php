<?php

namespace App\Infrastructure\Interfaces;

interface IRepository
{
    public function all($columns = array('*'));

    public function all_sorted($sort_by, $attribute, $columns = array('*'));

//    public function allSortedBy($attribute, $columns = array('*'));
//
//    public function allSortedByDesc($attribute, $columns = array('*'));

    public function paginate($perPage = 15, $columns = array('*'));

    public function create(array $data);

    public function insert(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id, $columns = array('*'));

    public function findBy($field, $value, $columns = array('*'));
}