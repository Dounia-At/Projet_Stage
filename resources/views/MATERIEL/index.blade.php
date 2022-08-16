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
        <table class="table">
            <head>
            <tr>
                <th></th>
                <th>Materiel</th>
                <th>Fournisseur</th>
                <th>Actions</th>
            </tr>
            </head>

            <body>
                @foreach($materiaux as $materiel)
                <tr>
                    <td> <img src="{{ asset('storage/'.$materiel->photo) }}" class="img-thumbnail"  alt="{{ $materiel->nom }}"> </td>
                    <td>{{ $materiel->nom }} </td>
                    <td>{{ $materiel->fournisseur->nomFournisseur }} </td>
                    <td>
                        <form action="{{ url('materiaux/'.$materiel->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ url('materiaux/'.$materiel->id) }}" class="btn btn-primary" role="button">Details</a>
                            <a href="{{ url('materiaux/'.$materiel->id.'/edit') }}" class="btn btn-default" role="button">Editer</a>
                            @can('delete', $materiel) 
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            @endcan     
                        </form>   
                    </td>
                </tr>
                @endforeach
            </body>
        </table>

       
        
        </div>
    </div>
</div>

@endsection