@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table class="table">
                
                <body>
                    <tr>
                        <td>Nom </td>
                        <td>{{ $materiel->nom }}</td>
                    </tr>
                    <tr>
                        <td>Categorie </td>
                        <td>{{ $materiel->categorie->libelle }}</td>
                    </tr>
                    <tr>
                        <td>Fournisseur</td>
                        <td>{{ $materiel->fournisseur->nomFornisseur }}</td>
                    </tr>
                    <tr>
                        <td>Quantite de stock </td>
                        <td >{{ $materiel->quantiteStock }}</td>
                       
                    </tr>
                    <tr>
                        <td>Marque </td>
                        <td>{{ $materiel->marque }}</td>
                    </tr>
                    <tr>
                        <td>Date d'entree </td>
                        <td>{{ $materiel->date_entree }}</td>
                    </tr>
                    <tr>
                        <td>Description </td>
                        <td>{{ $materiel->description }}</td>
                    </tr>
                </body>
            </table>
        
        <div class="form-group ">
            <a href="{{ url('materiaux') }}" class="btn btn-primary" role="button">Retour</a>
        </div>
            
    </div>
</div>

@endsection