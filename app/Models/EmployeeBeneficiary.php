<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeBeneficiary extends Model
{
     protected $table = 'employee_beneficiary';
	public $timestamps = false;
	protected $dates = ['beneficiary_dob'];
}
