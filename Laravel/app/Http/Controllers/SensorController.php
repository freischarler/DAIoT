<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sensor;
use App\Http\Resources\SensorCollection as SensorCollectionResource;

use App\Log;
use App\Http\Resources\Sensor as SensorResource;
use Illuminate\Support\Facades\Validator;


class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sensor = Sensor::all();
    
        return SensorCollectionResource::collection($sensor);
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
    public function store(Request $request)
    {
        $sensor= new sensor;
        $sensor->id=NULL;
        $sensor->serial=$request->input('serial');
        $sensor->ubicacion=$request->input('ubicacion');
        $sensor->temperatura=0;
        $sensor->humedad=0;
        $sensor->tiempo=NULL;
        $sensor->is_deleted=0;
        $sensor->save();

        if($sensor->save()){
            return new SensorCollectionResource($sensor);
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dispositivo)
    {
        //
        return new SensorResource(Log::findOrFail($dispositivo));
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
        $sensor = Sensor::where('id',$id)->get();
        
        $sensor->serial = $request->serial;
        $sensor->ubicacion = $request->ubicacion;
        $sensor->save();
        return new SensorCollectionResource($sensor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor = Sensor::where('id', $id)->get();
        $sensor->delete();
   
        return 'Client deleted successfully.';
    }

    public function editSensor(Request $request)
    {
        //$input = $request->all();
        
        $sensor = Sensor::findOrFail($request->id);
        
        $sensor->serial = $request->serial;
        $sensor->ubicacion = $request->ubicacion;
        $sensor->save();
        return ('edited successfully');
    }
}
