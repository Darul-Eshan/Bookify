<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction; 

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaction::query();

        if ($request->filled('search')) {
            $query->where('id', 'like', '%'.$request->search.'%')
                  ->orWhere('user_name', 'like', '%'.$request->search.'%')
                  ->orWhere('event_name', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $transactions = $query->latest()->paginate(10);
        $totalRevenue = Transaction::where('status', 'success')->sum('amount');
        $totalTransactions = Transaction::count();

        return view('backend.transactions.index', compact('transactions', 'totalRevenue', 'totalTransactions'));
    }
}