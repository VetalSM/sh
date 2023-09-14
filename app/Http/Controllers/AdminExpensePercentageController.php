<?php

namespace App\Http\Controllers;

use App\Models\ExpenseRate;
use Illuminate\Http\Request;

class AdminExpensePercentageController extends Controller
{
    public function index($locale,ExpenseRate $expense)
    {
        return view('admin.products.expense.index', [
            'expenses' => ExpenseRate::all()
        ]);
    }

    public function create($locale,ExpenseRate $expense)
    {
        return view('admin.products.expense.create', ['expense' => $expense]);
    }

    public function store()
    {
        ExpenseRate::create(array_merge($this->validateExpense()));

        return redirect('/'.app()->getLocale().'/admin/products/expense')->with('success', 'expense created');
    }
//
    public function edit($locale,ExpenseRate $expense)
    {
        return view('admin.products.expense.edit', ['expense' => $expense]);
    }

//
    public function update($locale,ExpenseRate $expense)
    {
        $attributes = $this->validateExpense($expense);
        $expense->update($attributes);
        return redirect('/'.app()->getLocale().'/admin/products/expense')->with('success', 'Expense Updated!');
    }

    public function destroy($locale,ExpenseRate $expense)
    {
        $expense->delete();
        return redirect('/'.app()->getLocale().'/admin/products/expense')->with('success', 'Expense Deleted!');
    }

    protected function validateExpense(?ExpenseRate $expense = null): array
    {
        $expense ??= new ExpenseRate();
        return request()->validate([
            'price_name' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'weight'  => 'required',
            'cost'  => 'required',
            'packaging' => 'required',
            'expenses' => 'required',
            'admin_expenses' => 'required',
            'other_expenses' => 'required',
            'tax' => 'required',
            'travel' => 'required',
            'advertising' => 'required',
            'profit' => 'required',

        ]);
    }
}
