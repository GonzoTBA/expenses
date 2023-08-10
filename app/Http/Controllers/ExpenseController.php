<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;


class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();

        return view('expenses.index', compact('expenses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
        ]);

        $data['date'] = now()->toDateString(); // Insertar automáticamente la fecha

        Expense::create($data);

        return redirect()->route('expenses.index')->with('success', 'Expense saved successfully.');
    }

    public function list() 
    {
        $expenses = Expense::all();

        return view('expenses.list', compact('expenses'));
    }
}