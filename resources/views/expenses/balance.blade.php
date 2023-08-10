@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Balance</h1>
        @if(isset($user) && isset($balance))
            <h2>Positive current balance for: {{ $user }}</h2>
            <h2>Amount: {{ $balance }} euros</h2>
        @else
            <p>Balance could not be calculated.</p>
        @endif
    </div>
@endsection