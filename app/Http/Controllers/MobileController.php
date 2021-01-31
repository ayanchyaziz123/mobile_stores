<?php

namespace App\Http\Controllers;

use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobiles = Mobile::latest()->paginate(5);
        return view('mobiles.index', compact('mobiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobiles.create');
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
            'mobileId' => 'required',
            'mobile_model' => 'required',
            'mobile_country' => 'required',
            'mobile_price' => 'required'
        ]);

        Mobile::create($request->all());

        return redirect()->route('mobiles.index')
            ->with('success', 'Mobile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function show(Mobile $mobile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('mobiles.edit', [
            'mobiles' => Mobile::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mobileId' => 'required',
            'mobile_model' => 'required',
            'mobile_country' => 'required',
            'mobile_price' => 'required'
        ]);
        $mobiles = $request -> all();
        Mobile::find($id) -> update($mobiles);
        return redirect()->route('mobiles.index')
        ->with('success', 'Mobile Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mobile::destroy($id);
        return redirect()->route('mobiles.index')
        ->with('success', 'Mobile Deleted successfully.');
    }
}
