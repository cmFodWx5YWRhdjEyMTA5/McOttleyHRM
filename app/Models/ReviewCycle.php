<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewCycle extends Model
{
    protected $table = 'review_cycles';
	public $timestamps = false;
	protected $dates = ['cycle_start','cycle_end','review_start','review_end'];
}
