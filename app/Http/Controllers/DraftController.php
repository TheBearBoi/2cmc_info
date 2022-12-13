<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('draft.create');
    }

    public function dashboard()
    {
        $draft = Draft::orderBy('draft_id', 'desc')->first();
        switch($draft->phase)
        {
            case 1:
                return view('draft.active.drafting', ['draft' => $draft]);
            case 2:
                if($draft->is_team_draft)
                {
                    return view('draft.active.deck-building-teams', ['draft' => $draft]);
                } else
                {
                    return view('draft.active.deck-building', ['draft' => $draft]);
                }
            case 3:
            case 4:
            case 5:
                return view('draft.active.matches', ['draft' => $draft]);
        }

    }

    public function test()
    {
        return view('draft.test');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
