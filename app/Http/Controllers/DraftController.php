<?php

namespace App\Http\Controllers;

use App\Models\Draft;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Controller for Draft Pages
 *
 * @package App\Http\Controllers
 */
class DraftController extends Controller
{
    /**
     * TODO Display a listing of previous drafts
     *
     * @return View
     */
    public function index(): View
    {
        //
    }

    /**
     * Show the form for creating a new draft
     *
     * @return View
     */
    public function create(): View
    {
        return view('draft.create');
    }


    /**
     * Displays the currently active draft
     *
     * @return View
     */
    public function dashboard(): View
    {
        $draft = Draft::orderBy('draft_id', 'desc')->first();
        switch($draft->phase)
        {
            case 1:  // Drafting Phase
                return view('draft.active.drafting', ['draft' => $draft]);
            case 2:  // Deck Building Phase
                if($draft->is_team_draft)
                {
                    return view('draft.active.deck-building-teams', ['draft' => $draft]);
                } else
                {
                    return view('draft.active.deck-building-solo', ['draft' => $draft]);
                }
            case 3:  // Matches Phases
            case 4:
            case 5:
                return view('draft.active.matches', ['draft' => $draft]);
            default:
                // If the match is over, return the page for creating a new draft.
                //TODO add standings page, and return that at the end.
                return view('draft.create');
        }

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
     * TODO Display the specified draft, by id
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        //
    }
}
