<?php

namespace App\Transformers;

use App\Year;
use League\Fractal\TransformerAbstract;

class YearTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Year $year)
    {
        $years = $year->toArray();
        //$events['nameo'] = $events['name']; //change attribute name from nameo to name
        //unset($events['name']); //don't send the old eventName
        return $years;
    }
}
