<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeJob extends Model
{
    protected $table = 'employee_job_detail';
	public $timestamps = false;

	 public function employees()
    {
        return $this->belongsTo('McPersona\Models\Employee');
    }

}
