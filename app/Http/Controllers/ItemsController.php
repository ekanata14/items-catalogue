<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;
use App\Models\Items;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('items.index',[
            'items' => Items::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemsRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'sell_price' => 'required',
            'stock' => 'required'
        ]);

        $validatedData["item_id"] = Str::upper(Str::substr($validatedData['name'], 0, 3) . Str::substr($validatedData['name'], -3));

        Items::create($validatedData);

        return redirect('items')->with("success", $validatedData['name'] . ' has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemsRequest  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemsRequest $request, Items $item)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'sell_price' => 'required'
        ]);

        Items::where('id', $item->id)->update($validatedData);

        return redirect('/items')->with('success', $validatedData['name'] . " has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $item)
    {
        Items::destroy($item->id);
        return redirect('/items')->with('success', $item->name . " has been deleted");
    }
}
