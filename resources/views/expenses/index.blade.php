<!DOCTYPE html>
<html>
<head>
    <title>New Expense</title>
    <link href="{{ asset('build/assets/app-71455456.css') }}" rel="stylesheet">

</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            <h1>New Expense</h1>

            <!-- Formulario para introducir un nuevo gasto -->
            <form action="{{ route('expenses.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label for="amount">Amount<span style="color: red">*</span>:</label>
                    <input type="number" name="amount" id="amount" class="form-control" required>
                </div>
                <div class="mt-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Add Expense</button>
                </div>
            </form>
        </div>
    </div>


    <div id="success-message" class="alert alert-success d-none">
        {{ session('success') }}
    </div>



    <!-- Tabla que muestra la lista de gastos -->
    <table>
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
</body>
    <script>
        // Mostrar el mensaje de éxito si existe en la sesión
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            successMessage.classList.remove('d-none');
            setTimeout(() => {
                successMessage.classList.add('d-none');
            }, 5000); // Ocultar después de 5 segundos (5000 ms)
        }
    </script>

</html>
