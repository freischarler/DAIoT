<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Sensor;
use App\Http\Resources\SensorCollection as SensorCollectionResource;

use App\Log;
use App\Http\Resources\Sensor as SensorResource;



class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensor= Sensor::select()
        ->where('is_deleted', '=', 0)
        ->get();
        //$sensor = Sensor::all();
        //$sensor = Sensor::where('is_deleted','0';
        //$sensor = Sensor::table('sensors')->where('is_deleted',0)->get();
        $value=0;
        //$sensor = Sensor::where('is_deleted',0);
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
        echo "Request: " . $request->content;
        $input=$request->all();
        $validator=Validator::make($input,[
            'serial'=>'required',
            'ubicacion'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error',$validator->errors());
        }

        try{
            $sensor = new Sensor;
            $sensor->serial = $request->input('serial');
            $sensor->ubicacion = $request->input('ubicacion');
            $sensor->is_deleted=0;
            $sensor->id=NULL;
            $sensor->temperatura=NULL;
            $sensor->humedad=NULL;

            $sensor->save();
            return ("Insert successfully");
        }
        catch(Exception $e){
            return ("operation failed");
        }
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
        $input=$request->all();
        $validator=Validator::make($input,[
            'serial'=>'required',
            'ubicacion'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error',$validator->errors());
        }

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
        $sensor = Sensor::findOrFail($id);
        try{
            $sensor->is_deleted = 1;
            $sensor->save();
            return ("Insert successfully");
        }
        catch(Exception $e){
            return ("operation failed");
        }
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
