<?php

namespace App\Http\Controllers;
use App\Transaction;
use App\Product;
use App\UnitType;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function stock_in_create($id)
    {
        return view('stock.stock-in', ['id'=> $id]);
    }

    public function stock_in_store(Request $request, $id)
    {
        Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:0.1',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ])->validate();

        $oldQuantity = Transaction::where('product_id', $id)->select('total_quantity')->orderBy('id','DESC')->first();

        $transaction = new Transaction;
        $transaction->product_id = $id;
        $transaction->price = $request->price;
        $transaction->quantity = $request->quantity;
        $transaction->total_quantity = $request->quantity + ($oldQuantity ? $oldQuantity->total_quantity : 0);
        $transaction->status = 'Stock in';
        $transaction->user_id = Auth::user()->id;

        $transaction->save();

        return redirect()->route('product.index')->with('success', 'Stock in success!');
    }

    public function stock_out_create($id)
    {
        return view('stock.stock-out', ['id'=> $id]);
    }

    public function stock_out_store(Request $request, $id)
    {
    $oldQuantity = Transaction::where('product_id', $id)->select('total_quantity')->orderBy('id','DESC')->first();

    if(!$oldQuantity) {
        return redirect()->route('product.index')->with('success', 'No stocking!');
    }

    Validator::make($request->all(), [
    'quantity' => 'required|numeric|min:0.1|max:'.$oldQuantity->total_quantity,
    ])->validate();
    $transaction = new Transaction;
    $transaction->product_id = $id;
    $transaction->quantity = $request->quantity;
    $transaction->total_quantity = ($oldQuantity ? $oldQuantity->total_quantity : 0) - $request->quantity  ;
    $transaction->status = 'Stock out';
    $transaction->user_id = Auth::user()->id;
    $transaction->save();
    return redirect()->route('product.index')->with('success', 'Stock out success!');
    }

    public function corrupt_material_create($id)
    {
        return view('stock.corrupt-material', ['id'=> $id]);
    }

    public function corrupt_material_store(Request $request, $id)
    {
        $oldQuantity = Transaction::where('product_id', $id)->select('total_quantity')->orderBy('id','DESC')->first()->total_quantity;

        Validator::make($request->all(), [
            'quantity' => 'required|numeric|min:0.1|max:'.$oldQuantity,
        ])->validate();

        $transaction = new Transaction;
        $transaction->product_id = $id;
        $transaction->quantity = $request->quantity;
        $transaction->total_quantity = $oldQuantity - $request->quantity;
        $transaction->status = 'Corrupt Material';
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        return redirect()->route('product.index')->with('success', 'Corrupt Material success!');
    }


 public function transaction_index()
    {
        if (auth()->user()->position !== 1) {
            $transactios = Transaction::with('product.unit_type', 'unit_type', 'user')
                                        ->where('user_id', auth()->user()->id)
                                        ->get();
        } else {
            $transactios = Transaction::with('product.unit_type', 'unit_type', 'user')->get();
        }
        return view('transaction.index', ['transactios' => $transactios]);
    }

}
