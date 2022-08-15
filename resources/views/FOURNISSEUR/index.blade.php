@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
        <h1>Liste des fournisseurs</h1>
        <div class="pull-right ">
            <a href="{{ url('fournisseurs/create') }}" class="btn btn-success">Nouveau fournisseur</a>
        </div>
        <table class="table">
            <head>
            <tr>
                <th>Fournisseur</th>
                <th>adresse</th>
                <th>telephone</th>
                <th>email</th>
                <th>Actions</th>
            </tr>
            </head>

            <body>
                @foreach($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->nomFornisseur }} </td>
                    <td>{{ $fournisseur->adresse }} </td>
                    <td>{{ $fournisseur->telephone }} </td>
                    <td>{{ $fournisseur->email }} </td>
                    <td>
                        <form action="{{ url('fournisseurs/'.$fournisseur->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ url('fournisseurs/'.$fournisseur->id.'/edit') }}" class="btn btn-default">Editer</a>
                           <!-- @can('delete', $fournisseur) @endcan-->
                            <button type="submit" class="btn btn-danger">Supprimer</a>
                           
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