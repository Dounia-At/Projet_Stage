<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\affectation;

class AffectationController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    
    public function show($id) {
        
        return view('AFFECTATION.show');
    }

    public function index() {
       
       /* if(Auth::user()->is_admin)     $listcv = Cv::all();
        else    $listcv = Auth::user()->cvs;

        return view('cv.index', ['cvs' => $listcv]);*/
    }
    public function create() {
        return view('AFFECTATION.create');
    }
    public function store() {
       /* $cv = new Cv();
        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');
        $cv->user_id = Auth::user()->id;
        if($request->hasFile('photo')){
            $cv->photo = $request->photo->store('image/');
        }

        $cv->save();

        session()->flash('success', 'Le cv est bien enregistrés!!');

        return redirect('cvs');*/
    }
    public function edit($id) {
      /*  $cv = Cv::find($id);

        $this->authorize('update', $cv);

        return view('cv.edit', ['cv' => $cv]);*/
    }
    public function update( $id) {
       /* $cv = Cv::find($id);

        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');

        $cv->save();

        return redirect('cvs');*/
    }
    public function destroy($id) {
      /*  $cv = Cv::find($id);

        $cv->delete();

        return redirect('cvs');
*/
    }
}
