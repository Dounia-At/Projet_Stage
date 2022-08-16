<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Employee;

use Auth;

use App\Http\Requests\employeeRequest;


class EmployeeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index() {
       
        $listcat = employee::all();
        return view('employee.index', ['employees' => $listcat]);
    }
    public function create() {
        return view('employee.create');
    }
    public function store(employeeRequest $request) {
        $employee  = new employee ();
        $employee ->cin = $request->input('cin');
        $employee ->nom = $request->input('nom');
        $employee ->prenom = $request->input('prenom');
        $employee ->adresse = $request->input('adresse');
        $employee ->email = $request->input('email');
        $employee->telephone =  $request->input('telephone');
        $employee->user_id = Auth::user()->id;
        
        $employee ->save();

        session()->flash('success', 'La employee  est bien enregistrés!!');

        return redirect('employees');
    }
    public function edit($id) {
        $employee  = employee::find($id);

        //$this->authorize('update', $employee );

        return view('employee.edit', ['employee' => $employee ]);
    }
    public function update(employeeRequest $request, $id) {
        $employee  = employee::find($id);

        $employee ->cin = $request->input('cin');
        $employee ->nom = $request->input('nom');
        $employee ->prenom = $request->input('prenom');
        $employee ->adresse = $request->input('adresse');
        $employee ->email = $request->input('email');
        $employee->telephone = $request->input('telephone');
        $employee->user_id = Auth::user()->id;
        
        $employee ->save();

        return redirect('employees');
    }
    public function destroy($id) {
        $employee  = employee::find($id);
        $employee->user_id = Auth::user()->id;
        
        $employee ->save();
        $employee ->delete();

        return redirect('employees');
    
    }

}
