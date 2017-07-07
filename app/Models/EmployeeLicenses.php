<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeLicenses extends Model
{
    protected $table = 'employee_licenses';
	public $timestamps = false;
	protected $dates = ['issued_date','expiry_date'];
}
