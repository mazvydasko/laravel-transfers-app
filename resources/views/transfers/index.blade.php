@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <strong>Send</strong>
                    </div>
                    <form action="{{route('transfer.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="account_number">Account number</label>
                                        <input class="form-control" name="account_number" type="text"
                                               placeholder="Enter account number" value="{{old('account_number')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <div class="input-group">
                                            <input name="amount" class="form-control" type="text"
                                                   placeholder="Enter amount" value="{{old('amount')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-success float-right" type="submit">Continue</button>
                            <a class="btn btn-sm btn-dark" href="{{route('home')}}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
