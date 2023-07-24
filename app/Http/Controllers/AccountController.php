<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Inertia\Inertia;
class AccountController extends Controller
{
    public function view($id)
    {
        
        $account = Account::findOrFail($id);
        $account->load('students');
        // Get the students with the same department as the account
        $students = $account->students()->where('department', $account->department)->get();

        return Inertia::render('Admin/Accounts/View', [
            'account' => $account,
            'students' => $students,
        ]);
    }
    public function edit() {
        $account = Account::find(auth()->user()->id);
        return inertia('Account/Edit', [
            'account' => $account
        ]);
    }

    public function update(Request $request) {
        $fields = $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'address' => 'string|required',
            'email' => 'email|required',
            'phone_no' => 'string|required',
        ]);

        $account = auth()->user()->account;
        
        $account->update($fields);

        return back()->with('success', 'Information Updated.');
    }
}
