<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
class TweetController extends Controller
{

    public function create(Request $request)
    {
        $user = Auth::user();
        $idUser = $user->id;
        $client = new Client();
        $djangoHost=getenv('DJANGO_HOST');
        $content=$request['content'];
        $res = $client->request('POST', 'http://'.$djangoHost.'/api/create_tweet/', [
            'form_params' => [
                'id_user' => $idUser,
                'content' => $content,
            ]
        ]);

        return response()->json(['message' =>
            'Tweet created']);
    }

    public function getAll(Request $request){
        $user = Auth::user();
        $idUser = $user->id;
        $client = new Client();
        $djangoHost=getenv('DJANGO_HOST');
        $res = $client->request('GET', 'http://'.$djangoHost.'/api/tweets/'.$idUser);
        $body = $res->getBody();
        $decodedBody = json_decode($body, true);
        return response()->json(['message' => 'Correct', 'tweets' => $decodedBody
        ]);
    }
}
