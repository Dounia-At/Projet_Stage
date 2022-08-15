<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\affectation;

use App\materiel;

use App\employee;

use Auth;

class AffectationController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    
    public function show($id) {
        $affectation = Affectation::find($id);
        
        return view('affectation.show', ['affectation' => $materiel]);
    }

    public function index() {
       
        $listaff = Affectation::all();
        return view('affectation.index', ['affectation' => $listaff]);
    }
    public function create() {
        $listmat = Materiel::all();
        $listemp = Employee::all();
        
        return view('affectation.create', ['materiaux' => $listmat, 'employee' => $listemp]);
    }
    public function store(Request $request) {
        $materiel = Materiel::find($request->input('materiel_id'));
        
        if(($materiel->quantiteStock - (int) $request->input('quantite') )> 0)
        {
            $materiel->quantiteStock -= (int) $request->input('quantite');
            $affectation = new Affectation();
            $affectation->employee_id = $request->input('employee_id');
            $affectation->materiel_id = $request->input('materiel_id');
            $affectation->quantite = (int) $request->input('quantite');
            
            $affectation->save();

            session()->flash('success', 'L\'affectation est bien enregistrés!!');

        }
        else{
            session()->flash('warning', 'Le materiel est insuffisant!!');
        }
        
        return redirect('affectations');
    }
    public function edit($id) {
        $affectation = Affectation::find($id);
        $listmat = Materiel::all();
        $listemp = Employee::all();
        
        //$this->authorize('update', $materiel);

        return view('affectation.edit', ['affectation' => $affectation, 'materiaux' => $listmat, 'employee' => $listemp ]);
    }
    public function update(Request $request, $id) {
        $affectation = Affectation::find($id);


        $affectation->employee_id = $request->input('employee_id');
        $affectation->materiel_id = $request->input('materiel_id');
        $affectation->quantite = (int) $request->input('quantite');
        
        $affectation->save();

        return redirect('affectations');
    }
    public function destroy($id) {
        $affectation = Affectation::find($id);

        $affectation->delete();

        return redirect('affectations');
    }
}
