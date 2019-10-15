<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransfersRequest;
use App\Transfer;
use App\User;
use Illuminate\Support\Facades\Auth;

class TransfersController extends Controller
{
    public function index() {
        return view('transfers.index');
    }

    public function store(TransfersRequest $request) {

        $send_to_acc_number = $request->input('account_number');
        $send_to_amount = round($request->input('amount'), 2);

        $sending_user = Auth::user();
        $receiver_user = User::findUserByAccNumber($send_to_acc_number);

        if ($sending_user->unique_acc_number == $send_to_acc_number) {
            session()->flash('alert-danger', 'Check account number');
            return redirect()->back();
        }

        if ($sending_user->acc_balance >= $send_to_amount) {
            $receiver_user->acc_balance += $send_to_amount;
            $sending_user->acc_balance -= $send_to_amount;
            $receiver_user->save();
            $sending_user->save();

            $transfer = new Transfer();
            $transfer->sender_id = Auth::user()->id;
            $transfer->receiver_id = $receiver_user->id;
            $transfer->amount = $send_to_amount;
            $transfer->sent_to = $send_to_acc_number;
            $transfer->sent_from = Auth::user()->unique_acc_number;
            $transfer->save();
        } else {
            session()->flash('alert-danger', 'Not enough balance');
            return redirect()->back();
        }

        session()->flash('alert-success', 'Transaction successful');
        return redirect(route('home'));
    }
}
