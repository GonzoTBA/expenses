<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\User;
use Carbon\Carbon;


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
        $user = auth()->user();
        $data['user_id'] = $user->id; // Assign the user_id of the authenticated user

        Expense::create($data);

        return redirect()->route('expenses.index')->with('success', 'Expense saved successfully.');
    }

    public function list() 
    {
        $user = auth()->user();
        $expenses = Expense::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
        $totalAmount = $expenses->sum('amount');

        $firstExpense = $expenses->first();
        $firstExpenseDate = Carbon::parse($firstExpense->created_at)->format('d.m.Y');

        return view('expenses.list', compact('expenses', 'totalAmount', 'firstExpenseDate'));
    }

    public function balance()
    {
        // Calculate totals for both users
        $userId1 = 1;
        $userId2 = 2;
        $totalUser1 = Expense::where('user_id', $userId1)->sum('amount');
        $totalUser2 = Expense::where('user_id', $userId2)->sum('amount');
        $userName1 = User::find($userId1)->name;
        $userName2 = User::find($userId2)->name;

        if ($totalUser1 > $totalUser2) {
            $userWithHigherTotal = $userName1;
            $balance = $totalUser1 - $totalUser2;
        } else {
            $userWithHigherTotal = $userName2;
            $balance = $totalUser2 - $totalUser1;
        }

        $user = $userWithHigherTotal;

        return view('expenses.balance', compact('user', 'balance'));
    }
}