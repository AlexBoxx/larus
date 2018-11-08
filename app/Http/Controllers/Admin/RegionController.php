<?php

namespace App\Http\Controllers\Admin;

use App\Region;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Регионы';
        $data['regions'] = Region::paginate(10);

        return view('admin.region.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['title'] = 'Добавить Регион';
      $data['region'] = [];
      $data['countres'] = Country::get();

        return view('admin.region.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = $request->validate([
          'title' => 'required|string|max:255|min:3',
      ]);

      Region::create([
        'title' => $request['title'],
        'country_id' => $request['country_id']
      ]);

      return redirect()->route('admin.countryRegion', $request['country_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        $data['countres'] = Country::get();
        $data['region'] = $region;
        $data['title'] = 'Редактирование - '.$region['title'];
        $data['country'] = Country::where('id', $region['country_id'])->first();

        return view('admin.region.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Region $region)
    {
      $validator = $request->validate([
          'title' => 'required|string|max:255|min:3',
      ]);

      $region->title = $request['title'];
      $region->country_id = $request['country_id'];
      $region->save();

      return redirect()->route('admin.countryRegion', $request['country_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
      $region->delete();

      return redirect(url()->previous());
    }


    //main function
    //выборка регионов по стране
    public function countryRegion(Request $request, $id)
    {
      $country = Country::where('id', $id)->first();
      $data['country'] = $country;
      $data['regions'] = Region::countrys($id)->paginate(10);
      $data['title'] = $country['title'].' - Регионы ';


      return view('admin.region.index', $data);
    }


    public function regionCreate(Request $request, $country)
    {
      $data['title'] = 'Добавить Регион';
      $data['region'] = [];
      $data['countres'] = Country::get();
      $data['country'] = Country::where('id', $country)->first();


        return view('admin.region.create',$data);
    }
}
