<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class GraphController extends Controller
{
    public function index(){
        $transaction = Transaction::select(
            Transaction::raw('sum(price) as sums'),
            Transaction::raw("DATE_FORMAT(created_at,'%m') as monthKey"),
            Transaction::raw("DATE_FORMAT(created_at,'%y') as yearKey")
  )
  ->whereYear('created_at', date('Y'))
  ->groupBy('yearKey' ,'monthKey')
  ->get();

        return view('report.index',
        [
            'transaction'=>$transaction
        ]);
    }
}
