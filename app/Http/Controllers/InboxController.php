<?php

namespace App\Http\Controllers;

use App\Inbox;
use App\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Session;

class InboxController extends Controller
{
    public function index()
    {
        $messages = Inbox::where('to', Auth::user()->id)
            ->where('receiver_delete', 0)
            ->orderBy('id', 'DESC')
            ->get();
        return view('inbox.index', compact('messages'));
    }

    public function compose()
    {
        return view('inbox.compose');
    }

    public function show(Request $request)
    {
        $message = Inbox::findOrFail($request->id);
        $message->is_read = true;
        $message->save();
        return view('inbox.show', compact('message'));
    }

    public function getUsersEmail(Request $request)
    {
        $emails = User::where('email', 'LIKE', "%" . $request->email . "%")
            ->select(['id', 'email as text'])
            ->get();
        return (new Response($emails, '200'))->header('Content-Type', 'application/json');
    }

    public function sendEmail(Request $request)
    {
        if (isset($request->email)) {
            $inbox = new Inbox();
            $inbox->from = Auth::user()->id;
            $inbox->subject = $request->subject;
            $inbox->body = $request->body;
            $user = User::where('email', $request->email)->first();
            $inbox->to = $user->id;
            $inbox->save();
        } else {
            foreach ($request->to as $to) {
                $inbox = new Inbox();
                $inbox->from = Auth::user()->id;
                $inbox->subject = $request->subject;
                $inbox->body = $request->body;
                $inbox->to = $to;
                $inbox->save();
            }
        }


        Session::flash('message', 'message successfully.');
    }


    public function delete(Request $request)
    {   //TODO check if on delete type before fire delete
        $inbox = Inbox::findOrFail($request->id);
        $inbox->receiver_delete = true;
        $inbox->save();
        return redirect()->route('myInbox')->with('message', 'message deleted successfully.');
    }

    public function bulkDelete(Request $request)
    {
        foreach ($request->ids as $id) {
            $inbox = Inbox::findOrFail($id);
            $inbox->receiver_delete = true;
            $inbox->save();
        }

        return redirect()->route('myInbox')->with('message', 'message deleted successfully.');
    }


}
