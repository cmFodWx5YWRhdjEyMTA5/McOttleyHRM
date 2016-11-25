<?php

namespace OrionMedical\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveSchedule extends Model
{
    protected $table = 'leave_schedule';
	public $timestamps = false;

	public function employee()
	{
    return $this->belongsTo('OrionMedical\Models\Employee','employee');
	}
}
