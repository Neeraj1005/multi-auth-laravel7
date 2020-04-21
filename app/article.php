<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    protected $table = 'articles';

    protected $dates = ['published_at','edited_at'];
    protected $dateFormat = 'd/m/Y H:i:s';

    // protected $dates = ['created_at','updated_at'];
    // public function getCreatedAtAttribute($value)
    // {
    //     $date = Carbon::parse($value);
    //     return $date->format('d-m-Y');
    // }
}
