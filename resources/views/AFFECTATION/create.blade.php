@extends('layouts.app')

@section('content')

    

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ url('affectations') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            
               
                <div class="form-group @if($errors->get('employee_id')) has-error @endif">
                    <label for="employee_id">Employee</label>
                    <select class="form-control" name="employee_id">
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}">{{ $employee->nom }} {{ $employee->prenom }} - {{ $employee->cin }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group @if($errors->get('materiel_id')) has-error @endif">
                    <label for="materiel_id">Fournisseur</label>
                    <select class="form-control" name="materiel_id">
                        @foreach($materiaux as $materiel)
                            <option value="{{ $materiel->id }}">{{ $materiel->nom }} - {{ $materiel->fournisseur->nomFornisseur }} ({{ $materiel->quantiteStock }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group @if($errors->get('quantite')) has-error @endif">
                    <label for="quantite">Quantite </label>
                    <input type="number" name="quantite" class="form-control" value="{{ old('quantite') }}">
                        @if($errors->get('quantite'))
                            <div class="alert alert-warning">
                                <ul>
                                @foreach($errors->get('quantite') as $message)
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