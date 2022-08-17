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
            @if(session()->has('warning'))
            <div class="alert alert-warning">
                {{ session()->get('warning') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
        <h1>Liste des Affectations</h1>
        <div class="pull-right ">
            <a href="{{ url('affectations/create') }}" class="btn btn-success">Nouveau affectation</a>
        </div>
        <br> <br> <br>
        <table class="table" >
        <head>
            <tr>
                <th>Personnel</th>
                <th>Materiel</th>
                <th>Quantité</th>
                <th>Date d'affectation</th>
                <th>Ajouter par</th>
                <th>Actions</th>
            </tr>
            </head>
                <body>
                @foreach($affectations as $affectation)
                    <tr>
                        <td>{{ $affectation->employee->nom }} {{ $affectation->employee->prenom }} - {{ $affectation->employee->cin }}</td>
                        <td>{{ $affectation->materiel->nom }} - {{ $affectation->materiel->fournisseur->nomFournisseur }}</td>
                        <td >{{ $affectation->quantite }}</td>
                        <td >{{ $affectation->created_at }}</td>
                        <td >{{ $affectation->user->name }}</td>
                        <td>
                            <form action="{{ url('affectations/'.$affectation->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ url('affectations/'.$affectation->id.'/edit') }}" class="btn btn-default">Editer</a>
                            @can('delete', $affectation)
                                <button type="submit" class="btn btn-danger">Supprimer</a>
                            @endcan
                            </form>    
                        </td>
                    </tr>
                @endforeach
                </body>
            </table>
        
            
    </div>
</div>

@endsection