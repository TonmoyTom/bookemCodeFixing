<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllServiceCupon extends Model
{


    protected $guarded = ['id'];

    protected $casts = [
        'start_date' => 'datetime:Y-m-d',
        'end_date' => 'datetime:Y-m-d',
      ];
}
