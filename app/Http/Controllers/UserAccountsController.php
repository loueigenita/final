<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Student;

class UserAccountsController extends Controller
{
    public function index() {
        $accounts = Account::with('students')->get();
        return inertia('Admin/Accounts/Index', [
            'accounts' => $accounts,
        ]);
    }

    public function view(Account $account) {
        return inertia('Admin/Accounts/View', [
            'account' => $account
        ]);
    }

    public function update(Request $request, Account $account) {

        $fields = $request->validate([
            'fname' => 'string|required',
            'lname' => 'string|required',
            'address' => 'string|required',
            'email' => 'email|required',
            'phone_no' => 'string|required',
        ]);

        // $account = Account:find;
        
        $account->update($fields);

        return back()->with('success', 'Information Updated Successfully.');
    }

    public function search($searchKey) {

        return inertia('Admin/Accounts/Index', [
            'accounts' => Account::where('fname', 'like' , "%".$searchKey."%")
                                    ->orWhere('lname', 'like' , "%".$searchKey."%")
                                    ->get()
        ]);
    }

    public function toggleActive(Account $account) {
        $account->active = !$account->active;

        $account->save();

        return back()->with('success', 'Account status has been updated.');
    }
}
