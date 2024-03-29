<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Word;

class WordController extends Controller
{
    public function edit($wordID)
    {
        $word = word::findOrFail($wordID);

        return view('word.edit', compact('word'));
    }

    public function update($wordID, Request $request)
    {
        $word = word::findOrFail($wordID);

        $word->update($request->all());
        $word->save();

        return redirect('/heading/' . $word->heading_id);
    }

    public function destroy($wordID)
    {
        $word = word::findOrFail($wordID);

        $headingID = $word->heading_id;

        $word->delete();

        return redirect('/heading/' . $headingID);
    }

    public function create($headingID)
    {
        return view('word.create', compact('headingID'));
    }

    public function store(Request $request, $headingID)
    {
        $request->request->add(['heading_id' => $headingID]);

        $model = Word::create($request->all());

        return redirect('/heading/' . $headingID);
    }
}
