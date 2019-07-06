<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();

        return view('documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
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
            'title' => 'required',
            'content' => 'required'
        ]);

        $document = new Document([
            'author' => Auth::user()->email,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'ctime' => date('Y-m-d h:i:u'),
            'mtime' => date('Y-m-d h:i:u'),
            'hashtag' => '',
            'status' => $request->get('status')
        ]);

        $ret = $document->save();

        return redirect('/documents')->with('success', 'Document saved!');
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
        $document = Document::find($id);
        $options = [
            0 => "隱私發佈",
            1 => "公開發佈",
            2 => "暫存稿件"
        ];

        return view('documents.edit', compact('document', 'options'));
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
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $document = Document::find($id);
        $document->title = $request->get('title');
        $document->content = $request->get('content');
        $document->mtime = date('Y-m-d h:i:u');
        $document->status = $request->get('status');

        $ret = $document->save();

        return redirect('/documents')->with('success', 'Document updated!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::find($id);
        $document->delete();

        return redirect('/documents')->with('success', 'Document deleted!');
    }
}
