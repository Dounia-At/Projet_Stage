@extends('layouts.app')

@section('content')

    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('categories') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            
                <div class="form-group @if($errors->get('libelle')) has-error @endif">
                <label for="libelle">Libelle</label>
                <input type="text" name="libelle" class="form-control" value="{{ old('libelle') }}">
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
                <input type="submit" value="Enregistrer" class="form-control btn btn-primary"></div>
            </form>

        </div>
    </div>
</div>

@endsection