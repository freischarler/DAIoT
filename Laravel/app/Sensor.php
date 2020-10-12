<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = 'sensors';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'serial', 'ubicacion','is_deleted'
		//'id','serial', 'ubicacion','is_deleted','temperatura','humedad','tiempo'
	];
}
