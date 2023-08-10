<!DOCTYPE html>
<html>
<head>
    <title>Create Expense</title>
</head>
<body>
    <h1>Create Expense</h1>
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount">
        <br>
        <button type="submit">Create Expense</button>
    </form>
</body>
</html>
