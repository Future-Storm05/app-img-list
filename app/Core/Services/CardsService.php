<?php

namespace App\Core\Services;

use App\Core\Interfaces\ICardsService;
use App\Infrastructure\Repositories\CardsRepository;

class CardsService implements ICardsService
{

    private CardsRepository $repository;

    public function __construct(CardsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }
    public function getById($id)
    {
        return $this->repository->getById($id);
    }
    

}
