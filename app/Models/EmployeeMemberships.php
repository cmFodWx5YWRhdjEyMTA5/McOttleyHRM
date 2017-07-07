<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeMemberships extends Model
{
   protected $table = 'employee_membership';
	public $timestamps = false;
	protected $dates = ['sub_commencement_date','sub_renewal_date'];
}
