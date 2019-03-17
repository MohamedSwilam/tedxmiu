<?php

namespace App\Http\Controllers;

use App\event;
use App\SavedTalk;
use App\Transformers\SavedTalkTransformer;
use Illuminate\Http\Request;

class SavedTalkController extends Controller
{
    public function store(Request $request){
        if(
            SavedTalk::where([
                ['user_id', '=', $request->input('user_id')],
                ['talk_id', '=', $request->input('talk_id')]
            ])->get()->count() == 0
        ){
            $SavedTalk = new SavedTalk();
            $SavedTalk->user_id = $request->input('user_id');
            $SavedTalk->talk_id = $request->input('talk_id');
            return [
                'response' => $SavedTalk->save()
            ];
        } else{
            return [
                'response' => false
            ];
        }
    }

    public function isSaved($talk_id, $user_id)
    {
        return count(SavedTalk::where([
            ['talk_id', '=', $talk_id],
            ['user_id', '=', $user_id]
        ])->get()) > 0 ? "true" : "false";
    }

    public function show($user_id)
    {
        $savedTalks = SavedTalk::with(['talk','talk.user'])->where([
            ['user_id', '=', $user_id]
        ])->get();
        return fractal($savedTalks, new SavedTalkTransformer());
    }

    public function destroy($talk_id, $user_id)
    {
        return [
            'response' => SavedTalk::where([
                ['talk_id', '=', $talk_id],
                ['user_id', '=', $user_id]
            ])->delete()
        ];
    }
}
