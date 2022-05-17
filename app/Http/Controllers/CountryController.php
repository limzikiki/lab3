<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries =  DB::table('countries');
        $search_query = $request -> search_query;
        if($search_query != null){
            $countries -> where('country_name', 'LIKE', '%'.$search_query.'%');
        }
        $countries = $countries->get();
        return view('countries', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries_create');
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
            'country_name'=>'required|unique:countries',
            'country_code'=>'required|max:3'
        ]);
        $country = new Country();
        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;
        $country->save();
        return redirect('country/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('country', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('country.edit', compact('country'));
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
        $country = Country::findOrFail($id);

        $request->validate([
            'country_name'=>'required|unique:countries',
            'country_code'=>'required|max:3'
        ]);

        $country->country_name = $request->country_name;
        $country->country_code = $request->country_code;
        $country->save();

        return redirect('country/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::findOrFail($id)->delete();
        return redirect('country/');
    }
}
