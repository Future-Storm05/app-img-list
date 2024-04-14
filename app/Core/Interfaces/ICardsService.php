<?php

namespace App\Core\Interfaces;

interface ICardsService
{
    public function getAll();

    public function create($data);
    public function getById($id);

}
