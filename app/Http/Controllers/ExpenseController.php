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

        // Enter --- if no description
        $data['description'] = $data['description'] ?? '---';
        $data['date'] = now()->toDateString(); // Insert date automatically
        $user = auth()->user();
        $data['user_id'] = $user->id; // Assign the user_id of the authenticated user

        Expense::create($data);

        return redirect()->route('expenses.index')->with('success', 'Expense saved successfully.');
    }

    public function list() 
    {
        $user = auth()->user();
        $expenses = Expense::where('user_id', $user->id)->get();
        $totalAmount = $expenses->sum('amount');

        return view('expenses.list', compact('expenses', 'totalAmount'));
    }
}