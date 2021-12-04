<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Thingspeak;

class PagesController extends Controller
{
    public function index()
    {
        $thingspeakchannels = Thingspeak::select('thingspeak_api', 'user_id','channel_id')->get();

        // foreach ($thingspeakchannels as $thingspeakchannel)
        // 
        //     $thingspeakApi = $thingspeakchannel->thingspeak_api;
        //     $user_id = $thingspeakchannel->user_id;
        // }

        // $datas = Http::get($thingspeakApi);

        return view('index', compact('thingspeakchannels'));

    }

    public function show($channel_id)
    {
        $details = Thingspeak::where('channel_id', $channel_id)->first();

        $api_key = $details->thingspeak_api;

        $datas = Http::get($api_key);

        return view('show', compact('details', 'datas'));
    }
}
