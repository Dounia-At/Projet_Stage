@extends('layouts.app')

@section('content')

    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('employees') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            
                <div class="form-group @if($errors->get('cin')) has-error @endif">
                    <label for="cin">CIN :</label>
                    <input type="text" name="cin" class="form-control" value="{{ old('cin') }}">
                    @if($errors->get('cin'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('cin') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="form-group @if($errors->get('nom')) has-error @endif">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
                    @if($errors->get('nom'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('nom') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group @if($errors->get('prenom')) has-error @endif">
                <label for="prenom">Prenom :</label>
                <input type="text" name="prenom" class="form-control" value="{{ old('prenom') }}">
                @if($errors->get('prenom'))
                    <div class="alert alert-warning">
                        <ul>
                        @foreach($errors->get('prenom') as $message)
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
                <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
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
                <input type="number" name="email" class="form-control" value="{{ old('email') }}">
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