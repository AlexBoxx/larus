<?php

namespace App\Http\Controllers\Admin;

use App\Settlement;
use App\Region;
use App\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettlementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['title'] = 'Нас. пункты';
      $data['settlements'] = Settlement::paginate(10);

      return view('admin.settlement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['title'] = 'Добавить Нас.Пункт';
      $data['settlement'] = [];
      $data['regions'] = Region::get();
      $data['countres'] = Country::get();

        return view('admin.settlement.create',$data);
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

      Settlement::create($request->all());

      return redirect()->route('admin.regionSettlement', $request['region_id']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function show(Settlement $settlement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function edit(Settlement $settlement)
    {

      $data['settlement'] = $settlement;
      $data['settlements'] = Settlement::where('parent_id', '0')->where('region_id', $data['settlement']['region_id'])->get();
      $data['region'] = Region::where('id', $data['settlement']['region_id'])->first();
      $data['country']= Country::where('id', $data['settlement']['country_id'])->first();
      $data['regions'] = Region::where('country_id', $data['settlement']['country_id'])->get();

      $data['title'] = 'Редактировать - '.$data['settlement']['title'];


        return view('admin.settlement.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settlement $settlement)
    {

      if($settlement['region_id'] != $request['region_id'])
        {
          $sett_child = $settlement->children($settlement)->get();
        }

      $validator = $request->validate([
          'title' => 'required|string|max:255|min:3',
      ]);

      if (isset($sett_child))
      {
        foreach ($sett_child as $child) {
          $child->region_id = $request['region_id'];
          $child->save();
        }
      }


      $settlement->title = $request['title'];
      $settlement->country_id = $request['country_id'];
      $settlement->region_id = $request['region_id'];
      $settlement->parent_id = $request['parent_id'];
      $settlement->save();

      return redirect()->route('admin.regionSettlement', $request['region_id']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settlement  $settlement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settlement $settlement)
    {
      $sett_child = $settlement->children($settlement)->get();

      if (count($sett_child) > 0)
      {
        foreach ($sett_child as $child) {
          $child->parent_id = '0';
          $child->save();
        }
      }

      $settlement->delete();

      return redirect()->route('admin.regionSettlement', $settlement['region_id']);
    }



    public function regionSettlement(Request $request, $region)
    {
      $data['region'] = Region::where('id', $region)->first();
      $data['country']= Country::where('id', $data['region']['country_id'])->first();
      $data['settlements'] = Settlement::regions($region)->paginate(10);
      $data['title'] = $data['region']['title'].'- Нас. пункты';

      return view('admin.settlement.index', $data);
    }

    public function settlementCreate(Request $request, $region)
    {
      $data['title'] = 'Добавить Нас.Пункт';
      $data['settlement'] = [];
      $data['settlements'] = Settlement::where('parent_id', '0')->where('region_id', $region)->get();
      $data['region'] = Region::where('id', $region)->first();
      $data['country']= Country::where('id', $data['region']['country_id'])->first();
      $data['regions'] = Region::where('country_id', $data['country']['id'])->get();

      //dd($data['settlementys']);


        return view('admin.settlement.create',$data);
    }

}
