<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeEmergency extends Model
{
    protected $table = 'employee_emergency_contact';
	public $timestamps = false;
	protected $dates = ['emergency_dob'];
}
