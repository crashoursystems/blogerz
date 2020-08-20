<?php

namespace App\Http\Controllers\Admin;

use App\Market;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        $markets = Market::all();
        return view('admin.market.index', compact('markets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.market.create');
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
        Market::create([
            'servicename' => $request->servicename,
            'price' => intval($request->price),
            'description' => $request->content,
            'path' => $path
        ]);
        session()->flash('success', 'Продукт успешно создан');
        return redirect()->route('market.index');
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
        $market = Market::find($id);
        return view('admin.market.edit', compact('market'));
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
        $market = Market::find($id);
        if(isset($request->path)){
            $path = $request->file('path')->store('uploads', 'public');
        } else {
            $path = $market->path;
        }

        $market->update([
            'servicename' => $request->servicename,
            'price' => intval($request->price),
            'description' => $request->content,
            'path' => $path
        ]);
        session()->flash('success', 'Продукт успешно обновлен');
        return redirect()->route('market.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Market::where('id', $id)->delete();
        session()->flash('success', 'Продукт успешно удален');
        return redirect()->route('market.index');
    }
}
