<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
	public $timestamps = false;


	protected $dates = ['date_of_birth'];

	
     public function jobs()
    {
        return $this->hasMany('McPersona\Models\EmployeeJob','staff_id','staff_id');
    }
}
