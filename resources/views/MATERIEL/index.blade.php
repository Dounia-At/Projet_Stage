@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
        <h1>Liste des Materiels</h1>
        <div class="pull-right ">
            <a href="{{ url('materiaux/create') }}" class="btn btn-success">Nouveau Materiel</a>
        </div>
        <br> <br> <br>

        <div class="row" >
            @foreach($materiaux as $materiel)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 shadow p-4 mb-4 "  >
                    <img src="{{ asset('storage/'.$materiel->photo) }}" class="img-thumbnail"  alt="{{ $materiel->nom }}">
                    <div class="caption">
                        <h3>{{ $materiel->nom }} - {{ $materiel->fournisseur->nomFornisseur }}</h3>
                        <p>...</p>
                        <div>
                        <form action="{{ url('materiaux/'.$materiel->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ url('materiaux/'.$materiel->id) }}" class="btn btn-primary" role="button">Details</a>
                            <a href="{{ url('materiaux/'.$materiel->id.'/edit') }}" class="btn btn-default" role="button">Editer</a>
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                              
                        </form>    
                        </div>
                    </div>
            </div>
            @endforeach
        </div>

          
        
        </div>
    </div>
</div>

@endsection