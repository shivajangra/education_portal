<?php

namespace App\Models;

use Eloquent;

class Payroll extends Eloquent
{
    protected $fillable = ['title', 'amount', 'staff_id', 'description', 'payPeriod', 'ref_no'];

    public function staff()
    {
        return $this->belongsTo(User::class);
    }
}
