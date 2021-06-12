<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
    * @OA\Get(
    *     path="/api/social_media/google",
    *      tags={"Login Social Media"},
    *     @OA\Response(response="200", description="Login By Google.")
    * )
    */
    public function google()
    {
      return response()->json(['url' => route('login.google')  , 'status' => 200]);
    }

    /**
    * @OA\Get(
    *     path="/api/social_media/facebook",
    *      tags={"Login Social Media"},
    *     @OA\Response(response="200", description="Login By Facebook.")
    * )
    */
    public function facebook()
    {
      return response()->json(['url' => route('login.facebook') ,'status' => 200]);
    }
}
