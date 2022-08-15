<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Fournisseur;

use App\Http\Requests\fournisseurRequest;

class FournisseurController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
       
        $listcat = fournisseur::all();
        return view('fournisseur.index', ['fournisseurs' => $listcat]);
    }
    public function create() {
        return view('fournisseur.create');
    }
    public function store(fournisseurRequest $request) {
        $fournisseur = new fournisseur();
        $fournisseur->nomFournisseur = $request->input('nomFournisseur');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->email = $request->input('email');
       
        $fournisseur->save();

        session()->flash('success', 'La fournisseur est bien enregistrés!!');

        return redirect('fournisseurs');
    }
    public function edit($id) {
        $fournisseur = fournisseur::find($id);

        //$this->authorize('update', $fournisseur);

        return view('fournisseur.edit', ['fournisseur' => $fournisseur]);
    }
    public function update(fournisseurRequest $request, $id) {
        $fournisseur = fournisseur::find($id);

        $fournisseur->nomFournisseur = $request->input('nomFournisseur');
        $fournisseur->adresse = $request->input('adresse');
        $fournisseur->telephone = $request->input('telephone');
        $fournisseur->email = $request->input('email');
       
        $fournisseur->save();

        return redirect('fournisseurs');
    }
    public function destroy($id) {
        $fournisseur = fournisseur::find($id);

        $fournisseur->delete();

        return redirect('fournisseurs');
    
    }

}
