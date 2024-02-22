<?php

namespace App\Models;

use Eloquent;

class Event extends Eloquent
{
    protected  $fillable = ['name', 'time_from', 'time_to','color_code', 'created_by'];
}
