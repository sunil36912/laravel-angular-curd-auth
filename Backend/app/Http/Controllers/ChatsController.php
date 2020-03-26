<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::find($id);
        return view('chat')->with('user', $user);
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages()

    {


        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {


        $user = User::find($request->user['id']);
        $resptent = User::find($request->resptent['id']);
        $message1 = $request->message;

        $message = new Message();
        $message->user_id = $request->user['id'];

        $message->message = $request->message;
        $message->reciver_id = $request->resptent['id'];
        $result = $message->save();
        if ($result) {

            broadcast(new MessageSent($user, $message1, $resptent))->toOthers();

            return ['status' => 'Message Sent!'];
        } else {
            return ['error' => 'Message Not Sent!'];
        }






        /* $message = $user->messages()->create([
            'message' => $request->input('message')
        ]);
        8*/
    }


    public static function getAChatMessages()
    {
        $receiverUserId = 1;
        $senderUserId = 2;

        $first = DB::table("messages")->where([
            ['reciver_id', $receiverUserId],
            ['user_id', $senderUserId]
        ])->orderBy('created_at', 'DESC');

        $users = DB::table("messages")->where([
            ['user_id', $receiverUserId],
            ['reciver_id', $senderUserId]
        ])->union($first)->orderBy('created_at', 'DESC')
            ->get();
        dd($users);
    }
}
