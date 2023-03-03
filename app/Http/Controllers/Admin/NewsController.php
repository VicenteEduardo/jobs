<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $Logger;

    public function __construct()
    {
        $this->Logger = new Logger;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //
        $response['news'] = News::get();
        //Logger
        $this->Logger->log('info', 'Listou as Notícias');
        return view('admin.news.list.index', $response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->Logger->log('info', 'Cadastrar uma Notícia');
        return view('admin.news.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|min:5|max:255',
            'typewriter' => 'required|min:2|max:255',
            'body' => 'required|min:5',
            'image' => 'required|mimes:jpg,png,jpeg',
            'date' => 'required',

        ]);
        $file = $request->file('image')->store('news');
        $news = News::create([
            'path' => $file,
            'title' => $request->title,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'date' => $request->date,
            'state' => 'Autorizada'
        ]);

        //Logger
        $this->Logger->log('info', 'Cadastrou uma Notícia - ' . $news->title);
        return redirect("admin/news/show/$news->id")->with('create', '1');
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
        $response['news'] = News::find($id);
        //Logger
        $this->Logger->log('info', 'Visualizou uma Notícia com o identificador ' . $id);
        return view('admin.news.details.index', $response);
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
        $response['news'] = News::find($id);
        //Logger
        $this->Logger->log('info', 'Entrou em editar uma Notícia com o identificador ' . $id);

        return view('admin.news.edit.index', $response);
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
        $validation = $request->validate([
            'title' => 'required|min:5|max:255',
            'typewriter' => 'required|min:2|max:255',
            'body' => 'required|min:5',
            'date' => 'required',
            'image' => 'mimes:jpg,png,jpeg',
        ]);

        if ($file = $request->file('image')) {
            $file = $file->store('news');
        } else {
            $file = News::find($id)->path;
        }
        News::find($id)->update([
            'path' => $file,
            'title' => $request->title,
            'typewriter' => $request->typewriter,
            'body' => $request->body,
            'date' => $request->date,
            'state' => 'Autorizada'
        ]);
        //Logger
        $this->Logger->log('info', 'Editou uma Notícia com o identificador ' . $id);
        return redirect("admin/news/show/$id")->with('edit', '1');
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
        //Logger
        $this->Logger->log('info', 'Eliminou uma Notícia com o identificador ' . $id);
        News::find($id)->delete();
        return redirect()->back()->with('destroy', '1');
    }
}
