<?php

namespace OrionMedical\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
	public $timestamps = false;


	protected $dates = ['date_of_birth'];

	public function leaveschedule()
    {
        return $this->hasMany('OrionMedical\Models\LeaveSchedule','staff_id');
    }
}
