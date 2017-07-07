<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkExperience extends Model
{
    protected $table = 'employee_work_experience';
	public $timestamps = false;
	protected $dates = ['date_from', 'date_to'];
}
