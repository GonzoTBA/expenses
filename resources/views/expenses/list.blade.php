<!DOCTYPE html>
<html>
<head>
    <title>Expenses List</title>
    <link href="{{ asset('build/assets/app-71455456.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Expenses List</h1>

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $expense)
                    <tr>
                        <td>{{ $expense->description }}</td>
                        <td>{{ $expense->amount }}</td>
                        <td>{{ $expense->date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('expenses.index') }}" class="btn btn-primary">Back to main</a>
    </div>
</body>
</html>