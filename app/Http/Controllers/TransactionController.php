<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\transaction_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index(){
        $list = transaction::all();
        foreach($list as $row){
            $row->tr_amount = number_format($row->tr_amount,2);
        }
        return view('index',compact('list'));
    }

    public function showAddForm(){
        $type = transaction_type::all();
        return view('add',compact('type'));
    }

    public function insert(Request $request){
        $request->validate(
            [
                'tr_name' => 'required',
            ],
            [
                'tr_name.required' => 'กรุณากรอกชื่อรายการ',
            ]);
            $transaction = new transaction();
            
            $transaction->tr_type =  $request->tr_type;
            $transaction->tr_name = $request->tr_name;
            $transaction->tr_amount = $request->tr_amount;
            $transaction->tr_date_paid = $request->tr_date_paid;
            $saved = $transaction->save();
            if($saved){
                return redirect()->route('index')->with('success','เพิ่มข้อมูลสำเร็จ');
            }else{
                return redirect()->route('index')->with('error','ผิดพลาด');
                
            }
    }

    public function showEditForm($id)
    {
        $list = transaction::find($id);
        $type = transaction_type::all();
        return view('edit', compact('list','type'));
    }
    
    public function update(Request $request, $id)
    {
        //dd($request->fname, $request->fname, $request->tel, $request->role_id);
        $updated = transaction::find($id)->update([
            'tr_type' => $request->tr_type,
            'tr_name' => $request->tr_name,
            'tr_amount' => $request->tr_amount,
            'tr_date_paid' => $request->tr_date_paid,
        ]);
        if($updated){
            return redirect()->route('index')->with('success','เพิ่มข้อมูลสำเร็จ');
        }else{
            return redirect()->route('index')->with('error','ผิดพลาด');
            
        }
    }

    public function delete($id){
        $deleted = transaction:: find($id)->Delete();
        if($deleted){
            return redirect()->route('index')->with('success',"ลบข้อมูลเรียบร้อย");
        }else{
            return redirect()->route('index')->with('error','ผิดพลาด');
        }
        
    }

    public function showTReport(){
        $income = transaction::where('tr_type','01')->get();
        $income_m1 = 0;
        $income_m2 = 0;
        $income_m3 = 0;
        $income_m4 = 0;
        $income_m5 = 0;
        $income_m6 = 0;
        $income_m7 = 0;
        $income_m8 = 0;
        $income_m9 = 0;
        $income_m10 = 0;
        $income_m11 = 0;
        $income_m12 = 0;

        foreach($income as $row){
            $chkmonth = date('m', strtotime( $row->tr_date_paid));
            if($chkmonth = "01"){
                $income_m1 = $income_m1 + $row->tr_amount;

            }elseif($chkmonth = "02"){
                $income_m2 = $income_m2 + $row->tr_amount;

            }elseif($chkmonth = "03"){
                $income_m3 = $income_m3 + $row->tr_amount;

            }elseif($chkmonth = "04"){
                $income_m4 = $income_m4 + $row->tr_amount;

            }elseif($chkmonth = "05"){
                $income_m5 = $income_m5 + $row->tr_amount;

            }elseif($chkmonth = "06"){
                $income_m6 = $income_m6 + $row->tr_amount;

            }elseif($chkmonth = "07"){
                $income_m7 = $income_m7 + $row->tr_amount;

            }elseif($chkmonth = "08"){
                $income_m8 = $income_m8 + $row->tr_amount;

            }elseif($chkmonth = "09"){
                $income_m9 = $income_m9 + $row->tr_amount;

            }elseif($chkmonth = "10"){
                $income_m10 = $income_m10 + $row->tr_amount;

            }elseif($chkmonth = "11"){
                $income_m11 = $income_m11 + $row->tr_amount;

            }elseif($chkmonth = "12"){
                $income_m12 = $income_m12 + $row->tr_amount;

            }
        }
        $sumIncome = collect([
            (object) ['income'=>"$income_m1", 'month'=>"มกราคม"],
            (object) ['income'=>"$income_m2",'month'=>"กุมภาพันธ์"],
            (object) ['income'=>"$income_m3",'month'=>"มีนาคม"],
            (object) ['income'=>"$income_m4",'month'=>"เมษายน"],
            (object) ['income'=>"$income_m5",'month'=>"พฤษภาคม"],
            (object) ['income'=>"$income_m6",'month'=>"มิถุนายน"],
            (object) ['income'=>"$income_m7",'month'=>"กรกฎาคม"],
            (object) ['income'=>"$income_m8",'month'=>"สิงหาคม"],
            (object) ['income'=>"$income_m9",'month'=>"กันยายน"],
            (object) ['income'=>"$income_m10",'month'=>"ตุลาคม"],
            (object) ['income'=>"$income_m11",'month'=>"พฤศจิกายน"],
            (object) ['income'=>"$income_m12",'month'=>"ธันวาคม"]
        ]);

        $expense = transaction::where('tr_type','02')->get();
        $expense_m1 = 0;
        $expense_m2 = 0;
        $expense_m3 = 0;
        $expense_m4 = 0;
        $expense_m5 = 0;
        $expense_m6 = 0;
        $expense_m7 = 0;
        $expense_m8 = 0;
        $expense_m9 = 0;
        $expense_m10 = 0;
        $expense_m11 = 0;
        $expense_m12 = 0;
        foreach($expense as $row){
            $chkmonth = date('m', strtotime( $row->tr_date_paid));
            if($chkmonth = "01"){
                $expense_m1 = $expense_m1 + $row->tr_amount;

            }elseif($chkmonth = "02"){
                $expense_m2 = $expense_m2 + $row->tr_amount;

            }elseif($chkmonth = "03"){
                $expense_m3 = $expense_m3 + $row->tr_amount;

            }elseif($chkmonth = "04"){
                $expense_m4 = $expense_m4 + $row->tr_amount;

            }elseif($chkmonth = "05"){
                $expense_m5 = $expense_m5 + $row->tr_amount;

            }elseif($chkmonth = "06"){
                $expense_m6 = $expense_m6 + $row->tr_amount;

            }elseif($chkmonth = "07"){
                $expense_m7 = $expense_m7 + $row->tr_amount;

            }elseif($chkmonth = "08"){
                $expense_m8 = $expense_m8 + $row->tr_amount;

            }elseif($chkmonth = "09"){
                $expense_m9 = $expense_m9 + $row->tr_amount;

            }elseif($chkmonth = "10"){
                $expense_m10 = $expense_m10 + $row->tr_amount;

            }elseif($chkmonth = "11"){
                $expense_m11 = $expense_m11 + $row->tr_amount;

            }elseif($chkmonth = "12"){
                $expense_m12 = $expense_m12 + $row->tr_amount;

            }
        }
        $sumExpense = collect([
            (object) ['expense'=>"$expense_m1", 'month'=>"มกราคม"],
            (object) ['expense'=>"$expense_m2",'month'=>"กุมภาพันธ์"],
            (object) ['expense'=>"$expense_m3",'month'=>"มีนาคม"],
            (object) ['expense'=>"$expense_m4",'month'=>"เมษายน"],
            (object) ['expense'=>"$expense_m5",'month'=>"พฤษภาคม"],
            (object) ['expense'=>"$expense_m6",'month'=>"มิถุนายน"],
            (object) ['expense'=>"$expense_m7",'month'=>"กรกฎาคม"],
            (object) ['expense'=>"$expense_m8",'month'=>"สิงหาคม"],
            (object) ['expense'=>"$expense_m9",'month'=>"กันยายน"],
            (object) ['expense'=>"$expense_m10",'month'=>"ตุลาคม"],
            (object) ['expense'=>"$expense_m11",'month'=>"พฤศจิกายน"],
            (object) ['expense'=>"$expense_m12",'month'=>"ธันวาคม"]
        ]);
        return view('report.treport', compact('sumIncome','sumExpense'));
    }

    public function showIEReport(){
        $income = transaction::where('tr_type','01')->get();
        $sumIncome = 0;
        foreach($income as $row){
            $amount = $row->tr_amount;
            $sumIncome = $amount + $sumIncome;
        }
        $expense = transaction::where('tr_type','02')->get();
        $sumExpense = 0;
        foreach($expense as $row){
            $amount = $row->tr_amount;
            $sumExpense = $amount + $sumExpense;
        }
        $amount = $sumIncome - $sumExpense;
        $amount = number_format($amount,2);
        $sumIncome = number_format($sumIncome,2);
        $sumExpense = number_format($sumExpense,2);
        return view('report.iereport', compact('sumIncome','sumExpense','amount'));
    }
    public function search(Request $request){
        $search = $request->search;

        $result = transaction::where(function($query) use ($search){
            $query->whereMonth('tr_date_paid','=',"$search");
        })->get();
          
         
        $countResult = $result->count();
        $message = "ไม่พบข้อมูลที่คุณค้นหา";
        if($countResult > 0){
            return view('index',compact('search','result'));
        }else{
            return view('index',compact('search','result','message'));
        }
    }
}
