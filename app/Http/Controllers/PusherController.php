<?php

namespace App\Http\Controllers;

use App\Events\PusherBroadcast;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PusherController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $customerId = $request->input('customerId');
        $sender = $request->input('sender');
        // Gửi tin nhắn tới Pusher
        event(new PusherBroadcast($message, $customerId, $sender));

        return response()->json(['sender' => $sender]);
    }
}
