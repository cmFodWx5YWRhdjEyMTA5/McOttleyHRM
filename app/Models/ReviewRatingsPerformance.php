<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewRatingsPerformance extends Model
{
     protected $table = 'review_rating';
   public $timestamps = false;

   protected $fillable =['kra','weightage','manager','employee','comment','review_token','staff_id','created_on','created_by'];
}
