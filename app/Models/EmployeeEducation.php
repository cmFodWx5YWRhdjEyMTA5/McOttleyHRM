<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeEducation extends Model
{
    protected $table = 'employee_education';
	public $timestamps = false;
	protected $dates = ['school_start_date','school_end_date'];

}
