<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
	use HasFactory, SoftDeletes;


    	protected $fillable = [
		'name',
	];

	public function students(){
		return $this->hasMany(Student::class);
	}

	public static function boot() {
        	parent::boot();

        	static::deleting(function($school) { // before delete() method call this
        	     $school->students()->delete();
        	});
    	}

}
