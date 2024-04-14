@extends('app')

@section('contenido')
<div class="container-fluid mt-n22 px-6">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 mb-2">
                <!-- Page header -->
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mb-lg-0">
                            <h3 class="mb-0">Add cards</h3>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Advertencia!</strong> Algo salio mal..<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <div class="col-md-12">
                <!-- card -->
                <div class="card ">
                    <!-- card body -->
                    <div class="card-body">
                        <form action="{{route('cards.create')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div id="drop-area">
                                    <i class="bi bi-image"></i>
                                    <h3 class="head-drag">Drag & Drop</h3>
                                    <span class="head-drag">or <span class="button-drag">browse</span></span>
                                    <input class="form-control" type="file" name="card_image" id="fileInput" hidden /><br>
                                    <span class="support">Support: JPEG, JPG, PNG </span>
                                    
                                </div>
                            </div>
                            
                            <div class="mb-3 row">
                                <div class="col-sm-4">
                                    <input type="text" name="card_title" class="form-control" placeholder="Descripcion o Titulo">
                                </div>
                            </div>

                            <h4>Historia de michi:</h4>
                            <div class="form-floating">
                                <textarea class="editor"  id="editor" name="card_history" style="height: 100px"></textarea>
                                
                            </div>
                            <br>
                            <div>
                                <button type="submit" class="btn btn-primary me-2">Guardar</button>
                                <a href="{{route('cards.list')}}" type="button" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                        <br>

                        

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection