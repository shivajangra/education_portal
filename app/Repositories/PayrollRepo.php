<?php

namespace App\Repositories;

use App\Helpers\Qs;
use App\Models\Payroll;
use App\Models\PayrollRecord;
use App\Models\Receipt;

class PayrollRepo
{

    public function all()
    {
        return Payroll::all();
    }

    public function getPayment($data)
    {
        return Payroll::where($data)->with('my_class');
    }

    public function getGeneralPayment($data)
    {
        return Payroll::whereNull('my_class_id')->where($data)->with('my_class');
    }

    public function getActivePayments()
    {
        return $this->getPayment(['year' => Qs::getCurrentSession()]);
    }

    public function getPaymentYears()
    {
        return Payroll::select('year')->distinct()->get();
    }

    public function find($id)
    {
        return Payroll::find($id);
    }

    public function create($data)
    {
        return Payroll::create($data);
    }

    public function update($id, $data)
    {
        return Payroll::find($id)->update($data);
    }

    public function delete($id)
    {
        return Payroll::destroy($id);
    }

    /************** PAYMENT RECORDS ***************/

    public function findMyPR($st_id, $pay_id)
    {
        return $this->getRecord(['staff_id' => $st_id, 'payroll_id' => $pay_id]);
    }

    public function getAllMyPR($st_id, $month = NULL)
    {
        return $year ? $this->getRecord(['staff_id' => $st_id, 'for_month' => $month]) : $this->getRecord(['staff_id' => $st_id]);
    }

    public function getRecord($data, $order = 'year', $dir = 'desc')
    {
        return PayrollRecord::orderBy($order, $dir)->where($data)->with('payment');
    }

    public function createRecord($data)
    {
        return PayrollRecord::create($data);
    }

    public function findRecord($id)
    {
        return PayrollRecord::findOrFail($id);
    }

    public function updateRecord($id, $data)
    {
        return PayrollRecord::find($id)->update($data);
    }

    /************** PAYMENT RECEIPTS ***************/

    public function createReceipt($data)
    {
        return Receipt::Create($data);
    }

    public function deleteReceipts($data)
    {
        return Receipt::where($data)->delete();
    }

    public function getReceipt($data)
    {
        return Receipt::where($data);
    }

    public function getAllMyReceipts($pr_id)
    {
        return $this->getRecord(['pr_id' => $pr_id])->get();
    }

}
