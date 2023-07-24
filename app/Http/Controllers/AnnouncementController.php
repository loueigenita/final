<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Mail;

class AnnouncementController extends Controller
{
    public function index() {
        return inertia('Admin/Announcements/Index');
    }

    public function send(Request $request) {

        // dd($request);
        $emails = Account::pluck('email');

        if($request->message != null && $request->subject != null) {
            $subject = $request->subject;
            $content = $request->message;

            foreach($emails as $e) {

                Mail::send('email.bulk-mail', ['content' => $content], function($message) use ($subject, $e) {
                    $message->to($e);
                    $message->subject($subject);
                });
            }
        } else {
            return back()->with('error', 'Fields cannot be empty!');
        }

        

        return back()->with('success', 'Message has been sent to all students!');
    }
}
