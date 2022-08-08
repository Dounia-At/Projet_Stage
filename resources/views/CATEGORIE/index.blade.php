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
        <h1>Liste des Categories</h1>
        <div class="pull-right ">
            <a href="{{ url('categories/create') }}" class="btn btn-success">Nouveau categorie</a>
        </div>
        <table class="table">
            <head>
            <tr>
                <th>Categorie</th>
                <th>Actions</th>
            </tr>
            </head>

            <body>
                @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->libelle }} </td>
                    <td>
                        <form action="{{ url('categories/'.$categorie->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ url('categories/'.$categorie->id.'/edit') }}" class="btn btn-default">Editer</a>
                           <!-- @can('delete', $categorie) @endcan-->
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