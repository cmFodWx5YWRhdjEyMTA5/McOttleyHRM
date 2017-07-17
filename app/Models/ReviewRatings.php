<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewRatings extends Model
{
     protected $table = 'review_rating';
   public $timestamps = false;

   protected $fillable =['kra','weightage','scale','manager','employee','comment','review_token','staff_id','created_on','reviewtype','created_by','employee_reason','manager_feedback','director_feedback','hr_feedback','manager_mark','employee_mark','sup_comment_reason','strategy','challenges','failures','prob_1','prob_2','prob_3','prob_4','prob_5','prob_6','prob_7','prob_8','prob_9'];
}
