<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\affectation;

use App\materiel;

use App\employee;

use Auth;

use App\Http\Requests\affectationRequest;

class AffectationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
        $listaff = Affectation::all();
        return view('affectation.index', ['affectations' => $listaff]);
    }
    public function create() {
        $listmat = Materiel::all();
        $listemp = Employee::all();
        
        return view('affectation.create', ['materiaux' => $listmat, 'employees' => $listemp]);
    }
    public function store(affectationRequest $request) {
        $materiel = Materiel::find($request->input('materiel_id'));
        
        if(($materiel->quantiteStock - (int) $request->input('quantite') )> 0)
        {
            $materiel->quantiteStock -= (int) $request->input('quantite');
            $affectation = new Affectation();
            $affectation->employee_id = $request->input('employee_id');
            $affectation->materiel_id = $request->input('materiel_id');
            $affectation->quantite = (int) $request->input('quantite');
            $affectation->user_id = Auth::user()->id;
            
            $affectation->save();
            $materiel->save();

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

        return view('affectation.edit', ['affectation' => $affectation, 'materiaux' => $listmat, 'employees' => $listemp ]);
    }
    public function update(affectationRequest $request, $id) {
        $materiel = Materiel::find($request->input('materiel_id'));
        $aff = Affectation::find($id);
        if(($materiel->quantiteStock + $aff->quantite - (int) $request->input('quantite') )> 0)
        {
            $materiel->quantiteStock -= (int) $request->input('quantite') + $aff->quantite;
            $affectation = new Affectation();
            $affectation->employee_id = $request->input('employee_id');
            $affectation->materiel_id = $request->input('materiel_id');
            $affectation->quantite = (int) $request->input('quantite');
            $affectation->user_id = Auth::user()->id;
            
            $materiel->save();
            $affectation->save();

            session()->flash('success', 'L\'affectation est bien enregistrés!!');

        }
        else{
            session()->flash('warning', 'Le materiel est insuffisant!!');
        }
        
        return redirect('affectations');
    }
    public function destroy($id) {
        $affectation = Affectation::find($id);
        $materiel = Materiel::find($affectation->materiel_id);
        $materiel->quantiteStock += $affectation->quantite;
        $affectation->user_id = Auth::user()->id;
        $affectation->save();
        $affectation->delete();
        $materiel->save();


        return redirect('affectations');
    }
}
