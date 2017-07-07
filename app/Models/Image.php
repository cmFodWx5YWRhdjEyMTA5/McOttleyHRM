<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public $timestamps = false;
	 protected $table = 'images';
   	 protected $fillable = [
        'staff_id',
        'filename',
        'image'
    ];

    public function fileowner() {
    return $this->belongsToMany('\McPersona\Models\Customer');
}
}
