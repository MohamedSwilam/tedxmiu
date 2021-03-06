<?php

namespace App\Http\Controllers;

use App\Transformers\YearTransformer;
use App\Year;
use Illuminate\Http\Request;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = Year::orderBy('id','desc')->get();
        return fractal($years, new YearTransformer());
    }

    public function getSponsors()
    {
        $years = Year::with('sponsor')->orderBy('year','desc')->get();
        return fractal($years, new YearTransformer());
    }
}
