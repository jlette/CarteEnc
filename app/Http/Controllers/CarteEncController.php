<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarteEncController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        //$cartesEtudiant = \App\Models\CarteEtudiant::all();
        $cartesEtudiant = Auth::user()->demandeCarte;
        return view('index',compact('cartesEtudiant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomFichierCV' => 'required|file|max:8192'
        ]);


        if (\App\Models\CarteEtudiant::where('email', '=', $request->get('email'))->exists()) {


            return redirect('demandeCarte/create')->with('error','attention', 'l\adresse mail existe deja');
        }
        https://laravel.com/docs/8.x/validation#form-request-validation
        $nomFichierAttache = time().request()->nomFichierCV->getClientOriginalName();
        $request->nomFichierCV->storeAs('fichiers',$nomFichierAttache);
        $carteEtudiant = new \App\Models\CarteEtudiant ;
        $carteEtudiant->nomEtudiant = $request->get('nomEtudiantFormulaire') ;
        $carteEtudiant->email = $request->get('email');
        $carteEtudiant->numeroTelephone = $request->get('numeroTelephoneFormulaire');
        $date = date_create($request->get('dateEntreeENC'));
        $format = date_format($date,"Y-m-d");
        $carteEtudiant->dateEntreeENC = strtotime($format);
        $carteEtudiant->section = $request->get('section');
        $carteEtudiant->nomfichierCV = $nomFichierAttache;


        //dd($carteEtudiant);

        Auth::user()->demandecarte()->save($carteEtudiant);

        //$carteEtudiant->save();

        return redirect('demandeCarte')->with('success','Une nouvelle demande a été enregistrée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carteEtudiant = \App\Models\CarteEtudiant::find($id);
        return view('edit',compact('carteEtudiant','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carteEtudiant = \App\Models\CarteEtudiant::find($id);
        $carteEtudiant->nomEtudiant = $request->get('nom');
        $carteEtudiant->email = $request->get('email');
        $carteEtudiant->numeroTelephone = $request->get('number');
        Auth::user()->demandecarte()->save($carteEtudiant);
        return redirect('demandeCarte');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carteEtudiant = \AppModels\CarteEtudiant::find($id);
        $carteEtudiant->delete();
        return redirect('demandeCarte')->with('success','La demande a bien été supprimée');
    }
}
