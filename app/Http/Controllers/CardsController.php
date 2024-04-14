<?php

namespace App\Http\Controllers;

use App\Core\Interfaces\ICardsService;
use App\Models\CardsModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class CardsController
{
    private ICardsService $service;

    public function __construct(ICardsService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        //$searchText = $request->input('search');
        $cards = $this->service->getAll();

        //if ($request->ajax()) {
            //return view('panel.cards.search', ['cards' => $cards])->render();
        //}

        return view('panel.cards.list', ['cards' => $cards])->render();
    }


    public function search(Request $request)
    {
        Log::info('Llegó a la consulta de búsqueda');

        if ($request->ajax()) {
            $data = DB::table('cards')->where('card_title', 'like', '%' . $request->search . '%')->get();

            return response()->json($data);
        }
    }


    public function likeCard(Request $request)
    {
        log::error(json_encode($request->all()));
        try {
            $cardId = $request->input('card_like_id');
            
            // Buscamos la tarjeta por su ID
            $card = CardsModel::find($cardId);
    
            if ($card) {
                // Incrementamos el contador de likes
                $card->card_like += 1;
                $card->save();
                
                Log::info('Like registrado para la tarjeta con ID: ' . $cardId);
                
                //return response()->json(['success' => true, 'likes' => $card->card_like]);
            } else {
                Log::error('No se pudo encontrar la tarjeta con ID: ' . $cardId);
                //return response()->json(['success' => false, 'message' => 'No se pudo encontrar la tarjeta']);
            }
        } catch (\Exception $e) {
            Log::error('Error al procesar el like: ' . $e->getMessage());
            //return response()->json(['success' => false, 'message' => 'Error al procesar el like']);
        }

        return redirect()->route('cards.list');
    }

    

    public function create(Request $request) : RedirectResponse
    {
        Log::error('Create...');
        $request->validate([
            'card_image' => 'required|image',
            'card_title' => 'required',
            'card_history' => 'required'
        ]);
        

        $image = $request->file('card_image');

        $contentImg = file_get_contents($image->path());

        $nameImagen = uniqid(). '.'.$image->getClientOriginalExtension();

        $pathImagen = Storage::disk('public')->put($nameImagen, $contentImg);

        //$imagePath = $image->store('fotos');

        Log::error('img...'.$pathImagen);

        $data = [
            'card_image' => $nameImagen,
            'card_title' => $request->input('card_title'),
            'card_history' => $request->input('card_history')
        ];
        
       
        
        $this->service->create($data);
        
        return redirect()->route('cards.list')->with('success', 'Card Add Success');
    }

    public function destroyById($id)
    {
        
    }

    public function getById($id)
    {
        $cards = $this->service->getById($id);
        log::error(json_encode($cards));
        return view('panel.cards.list', ['cards'=> $cards]);
    }

    public function edit($id, Request $request)
    {
       
    }

    

}
