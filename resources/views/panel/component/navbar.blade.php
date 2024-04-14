<div class="header @@classList">
    <nav class="navbar-classic navbar navbar-expand-lg p-1">
        <a class="navbar-brand me-2" href="{{route('cards.list')}}">
            <img src="{{ asset('assets/images/gato-logo.png') }}" alt="Logo" width="80" height="75">
        </a>
        <div class="ms-lg-3 d-12 d-md-4 d-lg-block">
            
            <div class="input-group" id="input-group">
                @if(!request()->is('cards/add'))
                    <a class="btn btn-success rounded me-4" href="{{route('cards.add')}}" id="add-button">Agregar</a>
                    <input type="search" name="search" id="search" placeholder="Search card" class="form-control rounded" data-search-url="{{ route('cards.search') }}">
                @else 
                <a class="btn btn-secondary rounded me-4" href="{{route('cards.list')}}" id="add-button">Volver</a>
                @endif

            </div>
        </div>
    </nav>
</div>

