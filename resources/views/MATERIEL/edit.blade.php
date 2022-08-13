@extends('layouts.app')

@section('content')

    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('materiaux/'.$materiel->id)  }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
            
                <div class="form-group @if($errors->get('nom')) has-error @endif">
                    <label for="nom">Libelle</label>
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
                <div class="form-group @if($errors->get('photo')) has-error @endif">
                    <label for="photo">Image</label>
                    <input type="file" name="photo" class="form-control" value="{{ old('photo') }}">
                </div>
                <div class="form-group @if($errors->get('categorie_id')) has-error @endif">
                    <label for="categorie_id">Categorie</label>
                    <div class="pull-right my-2">
                        <a href="{{ url('categories/create') }}" class="btn btn-success">Nouveau categorie</a>
                    </div>
                    <select class="form-control" name="categorie_id">
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group @if($errors->get('fournisseur_id')) has-error @endif">
                    <label for="fournisseur_id">Fournisseur</label>
                    <select class="form-control" name="fournisseur_id">
                        @foreach($fournisseurs as $fournisseur)
                            <option value="{{ $fournisseur->id }}">{{ $fournisseur->nomFornisseur }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group @if($errors->get('quantiteStock')) has-error @endif">
                    <label for="quantiteStock">Quantite de stock</label>
                    <input type="number" name="quantiteStock" class="form-control" value="{{ old('quantiteStock') }}">
                    @if($errors->get('quantiteStock'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('quantiteStock') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group @if($errors->get('marque')) has-error @endif">
                <label for="marque">Marque</label>
                    <input type="text" name="marque" class="form-control" value="{{ old('marque') }}">
                    @if($errors->get('marque'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('marque') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group @if($errors->get('date_entree')) has-error @endif">
                    <label for="date_entree">Date d'entree</label>
                    <input type="date" name="date_entree" class="form-control" value="{{ old('date_entree') }}">
                    @if($errors->get('date_entree'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('date_entree') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="form-group @if($errors->get('description')) has-error @endif">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" >{{ old('description') }} </textarea>
                    @if($errors->get('description'))
                        <div class="alert alert-warning">
                            <ul>
                            @foreach($errors->get('description') as $message)
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