<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\KhachHang;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Chat::all();
    }

    public function show($id)
    {
        $message = Chat::findOrFail($id);
        return $message;
    }

    public function store(Request $request)
    {
        return Chat::create($request->all());
    }
    public function destroy($id)
    {
        $message = Chat::findOrFail($id);
        $message->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }

    public function getChatsByCustomerId($makh)
    {
        $message = Chat::where('cus_id', $makh)->get();
        return $message;
    }

    public function getCustomerChat()
    {
        $cusId = Chat::distinct()->get(['cus_id']);
        $cusData = [];

        foreach ($cusId as $item) {
            $customer = KhachHang::findOrFail($item->cus_id);
            $lastMessage = Chat::where('cus_id', $item->cus_id)->latest('created_at')->first();
            $cusData[] = [
                'id' => $item->cus_id,
                'TenKH' => $customer->HoTen,
                'seen' => $lastMessage->seen
            ];
        }
        return $cusData;
    }

    public function updateChat($cus_id)
    {
        $chats = Chat::where("cus_id", $cus_id)->get();
        foreach ($chats as $chat) {
            $chat->update([
                "seen" => true
            ]);
        }
        return $chats;
    }
}
