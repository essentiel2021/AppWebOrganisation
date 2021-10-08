<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retourne La liste des organisations
        //dd(Organisation::all()) ;
        $organisations = Organisation::OrderByDesc('id')->get();
        $data = [
            'title' =>'La liste des organisations - '. config('app.name'),
            'description' => 'Retrouver tous les organistions enregistrées en base de donnée',
            'organisations' => $organisations
        ];
        return view('organisations.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retourne un formulaire de création d'organisation(avant il faut etre authentifié) 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //traiter les données les verifier et les enregistré en base de donnée envoyé par le formulaire de creation
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organisation $organisation)
    {
        //retourne une organisation spécifique en fonction de son id
       $data = [
        'title' => $organisation->name. ' - '. config('app.name'),
        'description' =>$organisation->name.'. '. Str::words($organisation->description) ,
        'organisation' => $organisation
    ];
    return view('organisations.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //modification d'une organisation spécifique en fonction de son id
        return 'Je suis l\'organisation qui doit etre modifier,dont le id est : '.$id; 

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
        //verifier les données et mettre à jour l'organistion spéfique en base de donnée
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //supprimer l'organisation
        return 'Je suis l\'organisation qui doit etre supprimer,dont le id est : '.$id; 
    }
}
