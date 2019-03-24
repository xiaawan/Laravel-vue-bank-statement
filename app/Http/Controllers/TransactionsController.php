<?php

// TransactionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\TransactionCollection;
use App\Transaction;

class TransactionsController extends Controller
{
	public function store(Request $request)
	{
		$transaction = new Transaction([
			'type' => $request->get('type'),
			'amount' => $request->get('amount'),
			'description' => $request->get('description')
		]);

		$transaction->save();
		return response()->json('successfully added');
	}

	public function index()
	{
		$transactions = Transaction::orderBy('id', 'DESC')->get();
		return new TransactionCollection($transactions);
	}

	public function edit($id)
	{
		$transaction = Transaction::find($id);
		return response()->json($transaction);
	}

	public function update($id, Request $request)
	{
		$transaction = Transaction::find($id);

		$transaction->update($request->all());

		return response()->json('successfully updated');
	}

	public function delete($id)
	{
		$transaction = Transaction::find($id);

		$transaction->delete();

		return response()->json('successfully deleted');
	}
}