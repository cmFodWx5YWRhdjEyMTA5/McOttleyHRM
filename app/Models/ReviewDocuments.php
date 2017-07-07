<?php

namespace McPersona\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewDocuments extends Model
{
   protected $table = 'review_documents';
   public $timestamps = false;

   protected $dates = ['review_date'];
}
