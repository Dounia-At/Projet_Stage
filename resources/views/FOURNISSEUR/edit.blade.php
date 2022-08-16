@extends('layouts.app')

@section('content')

    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('fournisseurs/'.$fournisseur->id) }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
            
                <div class="form-group @if($errors->get('nomFournisseur')) has-error @endif">
                <label for="nomFournisseur">Nom complet :</label>
                <input type="text" name="nomFournisseur" class="form-control" value="{{ $fournisseur->nomFournisseur }}">
                @if($errors->get('nomFournisseur'))
                    <div class="alert alert-warning">
                        <ul>
                        @foreach($errors->get('nomFournisseur') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <div class="form-group @if($errors->get('adresse')) has-error @endif">
                    <label for="adresse">Adresse :</label>
                    <textarea name="adresse" class="form-control" >{{ $fournisseur->adresse }} </textarea>
                    
                    @if($errors->get('adresse'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('adresse') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div> <div class="form-group @if($errors->get('telephone')) has-error @endif">
                <label for="telephone">Tel :</label>
                <input type="text" name="telephone" class="form-control" value="{{ $fournisseur->telephone }}">
                @if($errors->get('telephone'))
                    <div class="alert alert-warning">
                        <ul>
                        @foreach($errors->get('telephone') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                </div>
                <div class="form-group @if($errors->get('email')) has-error @endif">
                <label for="email">Email :</label>
                <input type="email" name="email" class="form-control" value="{{ $fournisseur->email }}">
                @if($errors->get('email'))
                    <div class="alert alert-warning">
                        <ul>
                        @foreach($errors->get('email') as $message)
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