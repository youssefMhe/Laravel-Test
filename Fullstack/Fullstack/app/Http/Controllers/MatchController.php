<?php

namespace App\Http\Controllers;

use App\Models\Match;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$par_page =2;
        $all = Match::orderBy('id','asc')->paginate($par_page);
        return view('match.index',['all'=>$all]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('match.create');
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
            'score'=>'required|max:20|min:2' // methode de controle direct
        ]);

        $e = new Match();
        $e->score = $request->score;
        $e->equipe_visiteurs_id = $request->equipe_visiteurs_id;
        $e->equipe_locaux_id = $request->equipe_locaux_id;
        $e->save();
        return redirect()->route('Match.index')->with('message','match est ajouté avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        return view('Match.edit')->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $e= Match::find($id);

        $e->score = $request->score;
        $e->equipe_visiteurs_id = $request->equipe_visiteurs_id;
        $e->equipe_locaux_id = $request->equipe_locaux_id;

        $e->updated_at=now();
        $e->save();
        return redirect()->route('Match.index')->with('message',' Match modifiée avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        Match::find($id)->delete();
        return redirect()->route('Match.index')->with('message',' le match  est supprimée');
    }
}
