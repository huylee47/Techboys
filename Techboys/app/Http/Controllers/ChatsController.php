<?php

namespace App\Http\Controllers;

use App\Models\Chats;
use App\Service\ChatsService;
use Illuminate\Http\Request;

class ChatsController extends Controller
{
    private $chatsService;
    public function __construct(ChatsService $chatsService){
        $this->chatsService = $chatsService;
    }
    // ADMIN
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->chatsService->index();
    }
    public function loadMessagesAdmin($chatId){
        return $this->chatsService->loadMessageAdmin($chatId);
    }
    public function sendMessageAdmin(Request $request, $chatId){
        return $this->chatsService->sendMessageAdmin($request, $chatId);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Chats $chats)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chats $chats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chats $chats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chats $chats)
    {
        //
    }
    // CLIENT
    public function sendMessage(Request $request){
        $this->chatsService->sendMessage($request);
        return response()->json(['message' => 'Message sent successfully']);
    }
    public function loadMessage(){
        return response()->json($this->chatsService->loadMessage());
    }
}
