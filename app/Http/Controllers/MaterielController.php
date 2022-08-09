<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UpLoadedFile;

use Auth;

use App\Materiel;

use App\Fournisseur;

use App\Categorie;

class MaterielController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    
    public function show($id) {
        
        return view('materiel.show');
    }

    public function index() {
       
        $listmat = Materiel::all();
        return view('materiel.index', ['materiaux' => $listmat]);
    }
    public function create() {
        return view('materiel.create');
    }
    public function store(Request $request) {
        $materiel = new Materiel();
        $materiel->nom = $request->input('nom');
        $materiel->photo = $request->input('photo');
        $materiel->quantiteStock = $request->input('quantiteStock');
        $materiel->marque = $request->input('marque');
        $materiel->date_entree = $request->input('date_entree');
        $materiel->description = $request->input('description');
        
        $materiel->save();

        session()->flash('success', 'Le materiel est bien enregistrés!!');

        return redirect('materiaux');
    }
    public function edit($id) {
        $materiel = Materiel::find($id);

        //$this->authorize('update', $materiel);

        return view('materiel.edit', ['materiel' => $materiel]);
    }
    public function update(Request $request, $id) {
        $materiel = Materiel::find($id);

        $materiel->nom = $request->input('nom');
        $materiel->categorie_id = $request->input('categorie_id');
        $materiel->fournisseur_id = $request->input('fournisseur_id');
        $materiel->photo = $request->input('photo');
        $materiel->quantiteStock = $request->input('quantiteStock');
        $materiel->marque = $request->input('marque');
        $materiel->date_entree = $request->input('date_entree');
        $materiel->description = $request->input('description');
        
        $materiel->save();

        return redirect('materiaux');
    }
    public function destroy($id) {
        $materiel = Materiel::find($id);

        $materiel->delete();

        return redirect('materiaux');
    }
}
