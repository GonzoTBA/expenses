@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mt-4">Total Expenses: {{ $totalAmount }}€</h1>
    <p>Since {{ $firstExpenseDate }}</p>

    <h1 class="mt-4">Expenses List</h1>
    <p>Last first</p>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="table-cell-right-align">Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->description }}</td>
                    <td class="table-cell-right-align">{{ $expense->amount }}</td>
                    <td>{{ $expense->created_at->format('d.m.Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection