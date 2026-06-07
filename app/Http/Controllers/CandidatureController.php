<?php

namespace App\Http\Controllers;

use App\Models\Candidature;
use Illuminate\Http\Request;

class CandidatureController extends Controller{

        public function index(){
            $candidature=Candidature::all();
            $entretiens=Candidature::where('status', 'Entretien')->count();
            return view('candidatures.index', ['candidatures' => $candidature, 'entretiens' => $entretiens]);
          
        }

        public function create(){
            return view('candidatures.create');
        }
        
        public function show(Candidature $candidature){
            return view('candidatures.show', ['candidature' => $candidature]);
        }

        public function store(Request $request){
            $candidature= new Candidature();
            $candidature->company = $request->input('company');
            $candidature->position = $request->input('position');
            $candidature->status = $request->input('status');
            $candidature->applied_at = $request->input('applied_at');
            $candidature->save();

            return redirect()->route('candidatures.index');
        }

        public function edit(Candidature $candidature){
            return view('candidatures.edit', ['candidature' => $candidature]);
        }

        public function update(Request $request, Candidature $candidature){
            $candidature->company= $request->input('company');
            $candidature->position = $request->input('position');
            $candidature->status = $request->input('status');
            $candidature->applied_at = $request->input('applied_at');
            $candidature->save();

            return redirect()->route('candidatures.show', ['candidature'=> $candidature->id]);

        }
            public function destroy(Candidature $candidature){
                $candidature->delete();
                return redirect()->route('candidatures.index');
            }
};