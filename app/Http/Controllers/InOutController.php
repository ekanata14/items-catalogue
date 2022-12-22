<?php

namespace App\Http\Controllers;

use App\Models\InOut;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inout.index', [
            'items' => Items::all(),
            'inouts' => InOut::latest()->paginate(10)
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Items $item)
    {
        // Validating data
        $validatedData = $request->validate([
            'items_id' => 'required',
            'in' => 'required',
            'out' => 'required'
        ]);

        $array = explode(',',$validatedData['items_id']);
        $validatedData['items_id'] = $array[0];
        $validatedData['category_id'] = $array[1];

        // Get Item Name
        $myItem = $item->where('id', $validatedData['items_id'])->get('name');

        // Change Collection to Array
        $itemName = $myItem->map(function($item){
            return collect($item->toArray())->only('name')->all();
        });

        // Get the item name from array
        $validatedData['name'] = $itemName[0]['name'];

        // Debugging purpose only
        // dd($validatedData);

        // Store the data to database
        InOut::create($validatedData);

        // Return to In Out Page
        return redirect('inout')->with("success", $item->name . ' in out has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function show(InOut $inOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function edit(InOut $inOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InOut $inOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InOut  $inOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(InOut $inOut)
    {
        //
    }
}
