<?php

namespace App\Interfaces;

interface RekomChatRepositoryInterface{
    public function recommendation($req);
    public function chatbot($req);
    public function testChatbot();
}
