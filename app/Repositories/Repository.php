<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function save($params);
    public function update($params);
    public function find($id);
    public function findAll();
    public function delete($id);
}