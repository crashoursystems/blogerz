<?php

namespace App\Http\Controllers\Admin;

use App\Instruments;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    public function index()
    {
        $instruments = Instruments::all();
        return view('admin.instrument.index', compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instrument.create');
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
        Instruments::create([
            'name' => $request->name,
            'href' => $request->href,
            'description' => $request->content,
            'photo' => $path
        ]);
        session()->flash('success','Инструмент успешно создан');
        return redirect()->route('instrument.index');
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
        $instrument = Instruments::find($id);
        return view('admin.instrument.edit', compact('instrument'));
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
        $instrument = Instruments::find($id);
        if(isset($request->path)){
            $path = $request->file('path')->store('uploads', 'public');
        } else {
            $path = $instrument->path;
        }

        $instrument->update([
            'name' => $request->name,
            'href' => $request->href,
            'description' => $request->content,
            'photo' => $path
        ]);
        session()->flash('success','Инструмент успешно обновлен');
        return redirect()->route('instrument.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Instruments::where('id', $id)->delete();
        session()->flash('success','Инструмент успешно удален');
        return redirect()->route('instrument.index');
    }
}
