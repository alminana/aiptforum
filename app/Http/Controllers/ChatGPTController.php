<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class ChatGPTController extends Controller
{
    public function index()
    {
        return view('chatgpt.index');
    }

    public function ask(Request $request)
    {
        $prompt = $request->input('prompt'); 
        $response = $this->askToChatGPT($prompt);
        return view('chatgpt.response', ['response' => $response]);
    }

    private function askToChatGPT($prompt) 
    {
        $client = new Client();
        $url = 'https://api.openai.com/v1/chat/completions';
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . env('CHATGPT_API_KEY'),
        ];
        $body = [
            'model' => 'gpt-3.5-turbo',
            'messages' => [['role' => 'user', 'content' => $prompt]],
        ];
        $response = $client->post($url, [
            'headers' => $headers, 
            'json' => $body,
        ]);
        $result = json_decode($response->getBody(), true);
        return response()->json($result['choices'][0]['message']['content']);
    }
}



