<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationRequest;
use App\Models\Type;
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
        $types = Type::get();
        $data = [
            'types' => $types
        ];
        return view('organisations.create',$data);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrganisationRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['id_type'] = request('type');
        $organisation=Organisation::create($validatedData);
        $organisation->code = $this->codeAleatoire();
        $organisation->save();
        $success = 'Organisation ajoutée';
        return back()->withSuccess($success);
    }
    public function codeAleatoire($longueur = 7){
        $chaines = null;
        $caracteres = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longueurMax = strlen($caracteres);
        for ($i = 0; $i < $longueur; $i++)
        {
            $chaines .= $caracteres[rand(0, $longueurMax - 1)];
        }
        $organisation = Organisation::where('code', $chaines)->first();
        if($organisation != null){
            return $this->codeAleatoire();
        }
        return $chaines;
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
    public function edit(Organisation $organisation)
    {
        //modification d'une organisation spécifique en fonction de son id
        $data = [
            'organisation' => $organisation,
            'types' => Type::get()
        ];
        return view('organisations.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganisationRequest $request, Organisation $organisation)
    {
        //verifier les données et mettre à jour l'organistion spéfique en base de donnée
        $validatedData = $request->validated();
        $validatedData['id_type'] = request('type');
        Organisation::updateOrCreate(['id'=>$organisation->id],$validatedData);
        $success = 'Organisation modifieé';
        return back()->withSuccess($success);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        //supprimer l'organisation
        $organisation->delete();
        $success = 'Organisation surpprimée';
        return back()->withSuccess($success);
    }
}
