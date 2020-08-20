<?php

namespace App\Http\Controllers\Admin;

use App\Chat;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::all();
        return view('admin.chat.index', compact('chats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.chat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('path')->store('uploads', 'public');
        Chat::create([
            'name' => $request->name,
            'href' => $request->href,
            'photo' => $path
        ]);
        session()->flash('success','Чат успешно создан');
        return redirect()->route('chat.index');
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
        $chat = Chat::find($id);
        return view('admin.chat.edit', compact('chat'));
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
        $chat = Chat::find($id);
        if(isset($request->path)){
            $path = $request->file('path')->store('uploads', 'public');
        } else {
            $path = $chat->path;
        }

        $chat->update([
            'name' => $request->name,
            'href' => $request->href,
            'photo' => $path
        ]);
        session()->flash('success','Чат успешно обновлен');
        return redirect()->route('chat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chat::where('id', $id)->delete();
        session()->flash('success','Чат успешно удален');
        return redirect()->route('chat.index');
    }
}
