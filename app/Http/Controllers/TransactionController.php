<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //

    public function addTransaction(Request $request)
    {
        $user = $request->user();
        $data = $request->transaction;

        $transaction = Transaction::create([
            'id_user' => $user->id_user,
            'id_category' => $data['categoria']['id_category'],
            'id_currency' => 1,
            'subject' => $data['subject'],
            'quantity' => $data['quantity'],
            'type_transaction' => $data['type_transaction']
        ]);

        return response($transaction, 200);
    }

    public function getTransactionsMonth(Request $request)
    {

        $user = $request->user();

        $transactions = Transaction::select(
            'subject',
            'quantity',
            'type_transaction',
            'currencies.currency_icon',
            'categories.name',
            'categories.literal_name',
            'categories.img'
        )->leftJoin('categories', 'categories.id_category', '=', 'transactions.id_category')
        ->leftJoin('currencies', 'currencies.id_currency', '=', 'transactions.id_currency')
            ->where('transactions.id_user', $user->id_user)->whereMonth('transactions.created_at', Carbon::now()->month)->get();

        return response(["data" => ["transactions" => $transactions]], 200);
    }
}
