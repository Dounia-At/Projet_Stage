<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\categorie;

use Auth;

use App\Http\Requests\categorieRequest;

class CategorieController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index() {
       
        $listcat = Categorie::all();
        return view('categorie.index', ['categories' => $listcat]);
    }
    public function create() {
        return view('CATEGORIE.create');
    }
    public function store(categorieRequest $request) {
        $categorie = new Categorie();
        $categorie->libelle = $request->input('libelle');
        $categorie->user_id = Auth::user()->id;
        
        $categorie->save();

        session()->flash('success', 'La categorie est bien enregistrés!!');

        return redirect('categories');
    }
    public function edit($id) {
        $categorie = Categorie::find($id);

        //$this->authorize('update', $categorie);

        return view('categorie.edit', ['categorie' => $categorie]);
    }
    public function update(categorieRequest $request, $id) {
        $categorie = Categorie::find($id);

        $categorie->libelle = $request->input('libelle');
        $categorie->user_id = Auth::user()->id;
        
        $categorie->save();

        return redirect('categories');
    }
    public function destroy($id) {
        $categorie = Categorie::find($id);
        $categorie->user_id = Auth::user()->id;
        
        $categorie->save();

        $categorie->delete();

        return redirect('categories');
    }
}
