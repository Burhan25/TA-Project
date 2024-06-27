<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ChatMessageImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KonsultasiController extends Controller
{
    function index(Request $request)
    {
        $user = Auth::user();


        $chats = Chat::where(function($q)use($request){
            if (isset($request->category)) {
                $q->where('category', $request->query('category'));
            }
        })->orderByRaw("CASE WHEN created_by = ? THEN 0 ELSE 1 END", [$user->id])->orderBy('replied', 'ASC')->with(['user', 'messages'])->paginate(9);

        return view('frontend.konsultasi', compact('chats'));
    }

    function view(Chat $chat)
    {
        $user = Auth::user();
        $list = Chat::where(function($q)use($chat){
            $q->where('category', $chat->category);
        })->orderByRaw("CASE WHEN created_by = ? THEN 0 ELSE 1 END", [$user->id])->orderBy('replied', 'ASC')->with(['user', 'messages'])->paginate(6);

        return view('frontend.chat-konsultasi', compact('chat', 'list'));
    }

    function create(Request $request)
    {
        $chat = Chat::query()->create([
            'title' => $request->title,
            'category' => $request->category,
            'replied' => false,
            'created_by' => Auth::user()->id,
        ]);

        return redirect()->route('konsultasi.view', $chat->id);
    }

    function post_message(Chat $chat, Request $request)
    {
        $message = ChatMessage::query()->create([
            'chat_id'=>$chat->id,
            'user_id'=>Auth::user()->id,
            'message'=>$request->message,
        ]);
        if (Auth::user()->role == 'dokter') {
            $chat->replied = true;
            $chat->save();
        }

        if (isset($request->images)) {
            $imageCount = count($request->images);
            for ($i=0; $i < $imageCount; $i++) {
                $file = $request->images[$i];
                $path = 'chat/images';
                $filename = date('YmdHis-').$file->getClientOriginalName();
                Storage::putFileAs($path, $file, $filename);

                ChatMessageImage::query()->create([
                    'chat_message_id'=>$message->id,
                    'name'=>$filename,
                    'path'=>$path.'/'.$filename
                ]);
            }
        }
        return redirect()->back();

    }
}
