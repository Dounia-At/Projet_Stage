<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UpLoadedFile;

use Auth;

use App\Materiel;

use App\Fournisseur;

use App\Categorie;

use App\Http\Requests\materielRequest;


class MaterielController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function show($id) {
        $materiel = Materiel::find($id);
        
        return view('materiel.show', ['materiel' => $materiel]);
    }

    public function index() {
       
        $listmat = Materiel::all();
        return view('materiel.index', ['materiaux' => $listmat]);
    }
    public function create() {
        $listcat = Categorie::all();
        $listfournisseur = Fournisseur::all();
        
        return view('materiel.create', ['categories' => $listcat, 'fournisseurs' => $listfournisseur]);
    }
    public function store(materielRequest $request) {
        $materiel = new Materiel();
        $materiel->nom = $request->input('nom');
        if($request->hasFile('photo')){
            $materiel->photo = $request->photo->store('image/');
        }
        $materiel->categorie_id = $request->input('categorie_id');
        $materiel->fournisseur_id = $request->input('fournisseur_id');
        $materiel->quantiteStock = (int) $request->input('quantiteStock');
        $materiel->marque = $request->input('marque');
        $materiel->date_entree = $request->input('date_entree');
        $materiel->description = $request->input('description');
        
        $materiel->save();

        session()->flash('success', 'Le materiel est bien enregistrés!!');

        return redirect('materiaux');
    }
    public function edit($id) {
        $materiel = Materiel::find($id);
        $listcat = Categorie::all();
        $listfournisseur = Fournisseur::all();
        
        //$this->authorize('update', $materiel);

        return view('materiel.edit', ['materiel' => $materiel, 'categories' => $listcat, 'fournisseurs' => $listfournisseur]);
    }
    public function update(materielRequest $request, $id) {
        $materiel = Materiel::find($id);
        

        $materiel->nom = $request->input('nom');
        $materiel->categorie_id = $request->input('categorie_id');
        $materiel->fournisseur_id = $request->input('fournisseur_id');
        if($request->hasFile('photo')){
            $materiel->photo = $request->photo->store('image/');
        }
        $materiel->quantiteStock = (int) $request->input('quantiteStock');
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
