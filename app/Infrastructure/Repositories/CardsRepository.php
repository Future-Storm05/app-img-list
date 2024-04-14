<?php

namespace App\Infrastructure\Repositories;

use App\Models\CardsModel;

use Illuminate\Support\Facades\Log;


class CardsRepository
{
    private CardsModel $model;

    public function __construct(CardsModel $model)
    {
        $this->model = $model;
    }


    public function create(array $data): array
    {
        Log::error(implode('-',$data));
        $this->model->create([
            'card_image' => $data['card_image'],
            'card_title' => $data['card_title'],
            'card_history' => $data['card_history']
        ]);
        return $data;
        
    }

    public function update($id, $data){
        
    }

    public  function deleteById($id){
        
    }

    public function getAll($searchText = null){
        try {
            $query = $this->model::query();
            if($searchText){
                $query->where('card_title', 'like', '%'. $searchText. '%');
            }
            $cards = $query->get();
            //Log::error(json_encode($cards));

            return $cards;
        }catch (\Exception $e){
            return [];
        }
    }

    public  function  getById($id){
        try{
            $row =  $this->model::query()->findOrFail($id);
            return $row;
         }catch(\Exception $e){
             Log::error($e->getMessage());
             return null;
         }
    }

}