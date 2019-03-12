<?php
/**
 * Created by PhpStorm.
 * User: moham
 * Date: 2019/03/11
 * Time: 1:04 PM
 */

namespace App\Http\Controllers;


use App\ArticlesEmail;
//use http\Env\Request;
use Illuminate\Http\Request;

class ArticlesEmailController extends Controller
{
    public function store(Request $request){
        if(ArticlesEmail::where('email','=', $request->input('email'))->get()->count() == 0){
            $ArticlesEmail = new ArticlesEmail();
            $ArticlesEmail->email = $request->input('email');
            return [
                'response' => $ArticlesEmail->save()
            ];
        } else{
            return [
                'response' => false
            ];
        }
    }
}
