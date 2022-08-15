@extends('layouts.app')

@section('content')

    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('categories/'.$categorie->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
            
                <div class="form-group @if($errors->get('libelle')) has-error @endif">
                <label for="libelle">Nouveau Categorie :</label>
                <input type="text" name="libelle" class="form-control" value="{{ $categorie->libelle }}">
                @if($errors->get('libelle'))
                    <div class="alert alert-warning">
                        <ul>
                        @foreach($errors->get('libelle') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                
                
                
                <div class="form-group">
                <input type="submit" value="Modifier" class="form-control btn btn-primary"></div>
            </form>

        </div>
    </div>
</div>

@endsection