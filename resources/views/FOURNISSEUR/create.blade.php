@extends('layouts.app')

@section('content')

    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('fournisseurs') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            
                <div class="form-group @if($errors->get('nomFornisseur')) has-error @endif">
                    <label for="nomFornisseur">Nom Complet :</label>
                    <input type="text" name="nomFornisseur" class="form-control" value="{{ old('nomFornisseur') }}">
                    @if($errors->get('nomFornisseur'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('nomFornisseur') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="form-group @if($errors->get('adresse')) has-error @endif">
                    <label for="adresse">Adresse :</label>
                    <textarea name="adresse" class="form-control" >{{ old('adresse') }} </textarea>
                    
                    @if($errors->get('adresse'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('adresse') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group @if($errors->get('telephone')) has-error @endif">
                <label for="telephone">Tel :</label>
                <input type="tel" name="telephone" class="form-control" value="{{ old('telephone') }}">
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
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
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
                <input type="submit" value="Enregistrer" class="form-control btn btn-primary"></div>
            </form>

        </div>
    </div>
</div>

@endsection