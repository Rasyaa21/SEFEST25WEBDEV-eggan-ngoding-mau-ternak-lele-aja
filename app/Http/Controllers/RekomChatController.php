<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecommendationRequest;
use Exception;
use Illuminate\Http\Request;
use App\Repositories\RekomChatRepository;
use App\Interfaces\RekomChatRepositoryInterface;

class RekomChatController extends Controller
{
    private RekomChatRepositoryInterface $RekomChatRepository;
    public function __construct(RekomChatRepositoryInterface $rekomChatRepository) {
        $this->RekomChatRepository = $rekomChatRepository;
    }


    public function index(){
        return view('pages.section.KolamCerdas');
    }

    public function testChatbot(){
        $this->RekomChatRepository->testChatbot();
        return view('pages.section.KolamCerdas');
    }
}
