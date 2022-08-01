<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Student extends Model
{
    	use HasFactory, SoftDeletes;
	
	protected $fillable = [
		'name',
		'school_id'
	];
	public function school(){
        	return $this->belongsTo(School::class);
	}
	public static function boot(){
        	parent::boot();

        	self::created(function($model){
        		self::studentSort();
        	});

        	self::updated(function($model){
			self::studentSort();
		});
	}

	public static function studentSort(){
		DB::unprepared("
			SET @c=0;
			UPDATE students SET `order` = (@c:=@c+1) ORDER BY school_id, id;
		");
	}
}
