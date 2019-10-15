@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Your balance: {{$user->getUserBalance()}}</h3>
                        Your account number: {{$user->unique_acc_number}}
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary mb-5" href="{{route('transfer.index')}}">Send</a>
                        <div class="mt-5">
                            <h3>Received transactions</h3>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Received from</th>
                                    <th scope="col">Amount, EUR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->received as $received)
                                    <tr>
                                        <th scope="row">{{$received->created_at}}</th>
                                        <td>{{$received->sent_from}}</td>
                                        <td>+{{$received->amount}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                            <h3>Sent transactions</h3>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Sent to</th>
                                    <th scope="col">Amount, EUR</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->sent as $sent)
                                    <tr>
                                        <th scope="row">{{$sent->created_at}}</th>
                                        <td>{{$sent->sent_to}}</td>
                                        <td>-{{$sent->amount}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
