<?php

namespace App\Http\Controllers;

use App\Models\Candidatures;
use Illuminate\Http\Request;

class CandidatureController extends Controller{

        public function index(){
            $cand=Candidatures::all();
            $entretiens=Candidatures::where('status', 'Entretien')->count();
            return view('candidatures.index', ['candidatures' => $cand, 'entretiens' => $entretiens]);
          
        }

        public function create(){
            return view('candidatures.create');
        }
        
        public function show(Candidatures $cand){
            return view('candidatures.show', ['candidature' => $cand]);
        }

        public function store(Request $request){
            $cand= new Candidatures();
            $cand->company = $request->input('company');
            $cand->position = $request->input('position');
            $cand->status = $request->input('status');
            $cand->applied_at = $request->input('applied_at');
            $cand->save();

            return redirect()->route('candidatures.index');
        }

        public function edit(Candidatures $cand){
            return view('candidatures.edit', ['candidature' => $cand]);
        }

        public function update(Request $request, Candidatures $cand){
            $cand->company= $request->input('company');
            $cand->position = $request->input('position');
            $cand->status = $request->input('status');
            $cand->applied_at = $request->input('applied_at');
            $cand->save();

            return redirect()->route('candidatures.show', ['candidature'=> $cand->id]);

        }

};