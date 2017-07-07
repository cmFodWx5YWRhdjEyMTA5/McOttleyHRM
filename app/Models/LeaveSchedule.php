<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveSchedule extends Model
{
    protected $table = 'leave_schedule';
	public $timestamps = false;
	protected $dates = ['leave_from','leave_to'];

	public function employee()
	{
    return $this->belongsTo('McPersona\Models\Employee','employee');
	}
}
