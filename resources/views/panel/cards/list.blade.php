@extends('app')

@section('contenido')
        @if(Session::get('success'))
        <div class="alert alert-success mt-2">
            <strong>{{Session::get('success')}}<br>
        </div>
        @endif
    <section id="packages" class="pt-md-2">
       
            <div class="container p-1 my-1">
                <div class="row gy-4">
                    @foreach($cards as $card)
                    
                        <div class="alldata col-sm-12 col-md-6 col-lg-4">
                                <div class="card h-100">
                                    <img src="{{asset('storage/'.$card->card_image)}}" class="card-img-top" alt="{{ $card->card_image }}" data-bs-toggle="modal" data-bs-target="#exampleModal{{$card->card_id}}">
                                    <div class="card-body">
                                        <h5 class="card-title" data-bs-toggle="modal" data-bs-target="#exampleModal{{$card->card_id}}">{{$card->card_title}}</h5>
                                        <!--Button Like btn position-absolute top-0 start-0 m-1 p-0 gy-4-->
                                        <form action="{{route('like.card')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="card_like_id" value="{{$card->card_id}}">
                                            <button type="submit" class="btnLike btn position-absolute top-0 start-0 m-1 p-0" data-card-id="{{ $card->card_id }}">
                                                <i class="bi bi-heart-fill"><span class="like-count"> {{$card->card_like}}</span></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade modal-lg" id="exampleModal{{$card->card_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable p-2">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <img src="{{asset('storage/'.$card->card_image)}}" class="card-img-top" alt="{{ $card->card_image }}">
                                            </div>
                                            <div class="col-md-6 mb-4">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <h1 class="modal-title fs-5 p-3" id="exampleModalLabel">{{$card->card_title}}</h1>
                                                    </div>
                                                    <div class="col-12">
                                                    <button type="submit" class="btnLike p-3" data-card-id="{{ $card->card_id }}">
                                                        <i class="bi bi-heart-fill" style="font-size: 23px"><span class="like-count">{{$card->card_like}}</span></i>
                                                    </button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-4">
                                                <div class="card">
                                                    <div innert class="m-3">
                                                            {!!$card->card_history!!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 ms-auto">
                                                <div class="card">
                                                    <button type="button" class="btn btn-secondary float-right" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                    <!--Vista busqueda-->
                    <div class="vistadata row gy-4" id="container_search">
                        
                    </div>
            </div>
        </div>


        
    </section>

    
@endsection
