<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = Theme::with(['createdBy', 'updatedBy'])->get();
        //dd($themes);

        return view('themes.index', compact('themes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('themes.create');
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
            'name' => ['required','unique:themes','max:50'],
            'cdn_url' => ['required', 'unique:themes', 'url', 'max:255'],

        ]);

        //puts new record in database
        //save the data as a new country
        Theme::create([
            'name' => $request->name,
            'cdn_url' => $request->cdn_url,
            'created_by' => auth()->id(), // same as Auth::User


        ]);
        // ask controller to redirect back to index route
        // gets updated list
        return redirect(route('themes.index'))->with('status', 'Theme has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        return view('themes.show', compact('theme'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        return view('themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $request->validate([
            'name' => ['required','unique:themes,name,' . $theme->id,'max:50'],
            'cdn_url' => ['required', 'unique:themes,cdn_url,' . $theme->id , 'url', 'max:255'],
        ]);
        //save any changes
        $theme->name = $request->name;
        $theme->cdn_url = $request->cdn_url;
        $theme->updated_by = auth()->id();

        $theme->save();

        return redirect(route('themes.index'))->with('status', 'Theme Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        //
        if($theme->id == 1){ // dont delete default theme
            return redirect(route('themes.index'))->with('status', 'You cannot delete the Default theme');
        }
        $theme->delete();
        return redirect(route('themes.index'))->with('status', 'Theme Deleted');
    }
}
