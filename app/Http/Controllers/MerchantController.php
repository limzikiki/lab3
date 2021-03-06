<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $merchants = Merchant::query();
        $all_countries = Country::all();
        $search_query = $request -> search_query;
        $country_id = $request -> country_id;
        if($country_id != null && $country_id != -1){
            $merchants = $merchants->where("country_id", $country_id);
        }

        if($search_query != null){
            $merchants -> where('name', 'LIKE', '%'.$search_query.'%');
        }
        $merchants = $merchants -> get();
        return view('merchant.index', compact('merchants', 'all_countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('merchant.create', compact('countries'));
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
            'country_id'=>"required",
            'manager_name'=>"required|max:50",
            'year_founded'=>"required|numeric|min:1800|max:2023",
            "name"=>"required|max:100|unique:merchants"
        ]);

        Merchant::create([
            'country_id' => $request->country_id,
            'manager_name' => $request->manager_name,
            'year_founded' => $request->year_founded,
            'name' => $request->name
        ]);
        return redirect("merchant/");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merchant::findOrFail($id)->delete();
        return redirect('merchant/');
    }
}
