<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

use App\Device;
use App\Http\Resources\DeviceCollection as DeviceCollectionResource;



class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$device = Device::all();
        $device= Device::select()
        ->where('is_deleted', '=', 0)
        ->get();
        return DeviceCollectionResource::collection($device);
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
        $input=$request->all();
        $validator=Validator::make($input,[
            'serial'=>'required',
            'description'=>'required'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error',$validator->errors());
        }

        try{
            $device = new Device;
            $device->serial = $request->input('serial');
            $device->description = $request->input('description');
            $device->is_deleted=0;
            $device->estado=NULL;

            $device->save();
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
    public function show($id)
    {
        //
        return($device);
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
        $device = Device::findOrFail($id);
        try{
            $device->is_deleted = 1;
            $device->save();
            return ("Insert successfully");
        }
        catch(Exception $e){
            return ("operation failed");
        }
    }

    public function editDevice(Request $request)
    {
        //$input = $request->all();
        
        $device = Device::findOrFail($request->id);
        
        $device->serial = $request->serial;
        $device->description = $request->description;
        $device->save();
        return ('edited successfully');
    }
}
