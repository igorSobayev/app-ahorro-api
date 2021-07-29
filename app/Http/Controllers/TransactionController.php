<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use ArrayObject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function updateTransaction(Request $request)
    {
        $user = $request->user();
        $data = $request->transaction;

        $transaction = Transaction::where('id_transaction', $data['id_transaction'])
            ->where('id_user', $user->id_user)
            ->update([
                'id_category' => $data['categoria']['id_category'],
                'id_currency' => 1,
                'subject' => $data['subject'],
                'quantity' => $data['quantity'],
                'type_transaction' => $data['type_transaction']
            ]);

        return response($transaction, 200);
    }

    public function removeTransaction(Request $request)
    {
        $user = $request->user();

        Transaction::where('id_user', $user->id_user)->where('id_transaction', $request->id_transaction)->delete();

        return response(true, 200);
    }

    public function getTransactionsMonth(Request $request)
    {

        $user = $request->user();

        $transactions = Transaction::select(
            'subject',
            'quantity',
            'type_transaction',
            'transactions.created_at',
            'transactions.id_transaction',
            'currencies.currency_icon',
            'categories.name',
            'categories.literal_name',
            'categories.img'
        )->leftJoin('categories', 'categories.id_category', '=', 'transactions.id_category')
            ->leftJoin('currencies', 'currencies.id_currency', '=', 'transactions.id_currency')
            ->where('transactions.id_user', $user->id_user)->whereMonth('transactions.created_at', Carbon::now()->month)
            ->orderBy('transactions.created_at', 'DESC')->get();

        return response(["data" => ["transactions" => $transactions]], 200);
    }


    public function getTransactionsLast30Days(Request $request)
    {

        $user = $request->user();

        $transactions = Transaction::select(
            'subject',
            'quantity',
            'type_transaction',
            'transactions.created_at',
            'transactions.id_transaction',
            'currencies.currency_icon',
            'categories.name',
            'categories.literal_name',
            'categories.img'
        )->leftJoin('categories', 'categories.id_category', '=', 'transactions.id_category')
            ->leftJoin('currencies', 'currencies.id_currency', '=', 'transactions.id_currency')
            ->where('transactions.id_user', $user->id_user)->whereDate('transactions.created_at', '>', Carbon::now()->subDays(30))
            ->orderBy('transactions.created_at', 'DESC')->get();

        return response(["data" => ["transactions" => $transactions]], 200);
    }


    public function getAllTransactions(Request $request)
    {

        $user = $request->user();

        $transactions = Transaction::select(
            'subject',
            'quantity',
            'type_transaction',
            'transactions.created_at',
            'transactions.id_transaction',
            'currencies.currency_icon',
            'categories.name',
            'categories.literal_name',
            'categories.img'
        )->leftJoin('categories', 'categories.id_category', '=', 'transactions.id_category')
            ->leftJoin('currencies', 'currencies.id_currency', '=', 'transactions.id_currency')
            ->where('transactions.id_user', $user->id_user)
            ->orderBy('transactions.created_at', 'DESC')->get();

        return response(["data" => ["transactions" => $transactions]], 200);
    }

    public function getTransactionData(Request $request)
    {
        $user = $request->user();

        $transaction = Transaction::select(
            'subject',
            'quantity',
            'type_transaction',
            'id_transaction',
            'id_currency',
            'id_transaction',
            'id_account',
            'id_category'
        )->where('id_transaction', $request->id_transaction)->where('id_user', $user->id_user)->first();

        $transaction->categoria = Category::select('color', 'descr', 'id_category', 'img', 'literal_descr', 'literal_name', 'name', 'status')
            ->where('id_category', $transaction->id_category)->first();

        return response(["data" => ["transaction" => $transaction]], 200);
    }

    public function getTransactionsDataChartMonth(Request $request)
    {

        $user = $request->user();

        $transactions_ingresos = Transaction::select(
            DB::raw('ROUND(SUM(quantity), 2) as quantity'),
            DB::raw("DATE_FORMAT(created_at, '%d') as day"),
        )->where('id_user', $user->id_user)->whereMonth('created_at', Carbon::now()->month)
            ->where('type_transaction', 'suma')->groupBy('day')->get();

        $transactions_gastos = Transaction::select(
            DB::raw('ROUND(SUM(quantity), 2) as quantity'),
            DB::raw("DATE_FORMAT(created_at, '%d') as day"),
        )->where('id_user', $user->id_user)->whereMonth('created_at', Carbon::now()->month)
            ->where('type_transaction', 'resta')->groupBy('day')->get();

        $transactions_todo = [];
        $transactions_gastos_copia =  unserialize(serialize($transactions_gastos));

        // TODO falla el bucle cuando la transaccion que esta en suma, solo tiene esa operacion en ese dia, por lo tanto no la añade al array REVISAR
        foreach ($transactions_gastos_copia as $transaction) {

            foreach ($transactions_ingresos as $transaction_suma) {
                if ($transaction->day === $transaction_suma->day) {
                    $transaction->quantity = $transaction->quantity - $transaction_suma->quantity;
                }
            }

            array_push($transactions_todo, $transaction);
        }

        return response(["data" => [
            "transactions_todo" => $transactions_todo,
            "transactions_ingresos" => $transactions_ingresos,
            "transactions_gastos" => $transactions_gastos
        ]], 200);
    }
}
