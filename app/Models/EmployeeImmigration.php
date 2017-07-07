<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeImmigration extends Model
{
    protected $table = 'employee_immigration';
	public $timestamps = false;
	protected $dates =['issue_date','expiry_date'];
}
