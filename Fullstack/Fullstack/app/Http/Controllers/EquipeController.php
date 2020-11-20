<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{

    public  function list()
    { $a =Equipe::all();;
        return $a ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $par_page =3;
        $all = Equipe::orderBy('id','desc')->paginate($par_page);
        return view('equipe.index',['all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('equipe.create');
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
             'nom'=>'required|unique:equipes|max:20|min:2' // methode de controle direct
         ]);

        $e = new Equipe();
        $e->nom = $request->nom;
        $e->save();
        return redirect()->route('Equipe.index')->with('message','l equipe est ajouté avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Equipe.edit')->with('id',$id);
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
        //return redirect('category')->with('message','Catégorie modifiée avec succès');

        $c= Equipe::find($id);
        $c->nom=$request->nom;
        $c->updated_at=now();
        $c->save();
        return redirect()->route('Equipe.index')->with('message',' equipe modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Equipe::find($id)->delete();
        return redirect()->route('Equipe.index')->with('message',' l equipe est supprimée');
    }
}
