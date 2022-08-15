<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

class EmployeeController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    
    public function show($id) {
        
        return view('employee.show');
    }

    public function index() {
       
        $listcat = employee::all();
        return view('employee.index', ['employees' => $listcat]);
    }
    public function create() {
        return view('employee.create');
    }
    public function store(Request $request) {
        $employee  = new employee ();
        $employee ->cin = $request->input('cin');
        $employee ->nom = $request->input('nom');
        $employee ->prenom = $request->input('prenom');
        $employee ->adresse = $request->input('adresse');
        $employee ->email = $request->input('email');
        $employee->telephone = (int) $request->input('telephone');

        
        $employee ->save();

        session()->flash('success', 'La employee  est bien enregistrés!!');

        return redirect('employees');
    }
    public function edit($id) {
        $employee  = employee::find($id);

        //$this->authorize('update', $employee );

        return view('employee.edit', ['employee' => $employee ]);
    }
    public function update(Request $request, $id) {
        $employee  = employee::find($id);

        $employee ->cin = $request->input('cin');
        $employee ->nom = $request->input('nom');
        $employee ->prenom = $request->input('prenom');
        $employee ->adresse = $request->input('adresse');
        $employee ->email = $request->input('email');
        $employee->telephone = (int) $request->input('telephone');

        
        $employee ->save();

        return redirect('employees');
    }
    public function destroy($id) {
        $employee  = employee::find($id);

        $employee ->delete();

        return redirect('employees');
    
    }

}
