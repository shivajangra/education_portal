<?php

namespace App\Models;

use App\User;
use App\Payroll;
use Eloquent;

class PayrollRecord extends Eloquent
{
    protected $fillable =['staff_id', 'payroll_id', 'amt_paid', 'for_month', 'paid', 'balance', 'ref_no'];

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }

    public function receipt()
    {
        return $this->hasMany(Receipt::class, 'pr_id');
    }
}
