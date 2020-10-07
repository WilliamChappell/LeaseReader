<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Heading;
class HeadingController extends Controller
{
    public function show($headingID)
    {
        $heading = Heading::findOrFail($headingID);

        return view('heading.show', compact('heading'));
    }

    public function edit($headingID)
    {
        $heading = Heading::findOrFail($headingID);

        return view('heading.edit', compact('heading'));
    }

    public function update($headingID, Request $request)
    {
        $heading = Heading::findOrFail($headingID);

        $heading->update($request->all());
        $heading->save();

        return redirect('/home');
    }

    public function destroy($headingID)
    {
        $heading = Heading::findOrFail($headingID);

        foreach($heading->WordsRelation as $word){
            $word->delete();
        }

        $heading->delete();

        return redirect('/home');
    }

    public function create()
    {
        return view('heading.create');
    }

    public function store(Request $request)
    {
        $model = Heading::create($request->all());

        return redirect('/home');
    }
}

