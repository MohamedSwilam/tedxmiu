<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\event;

class EventTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(event $event)
    {
        $events = $event->toArray();
        //$events['nameo'] = $events['name']; //change attribute name from nameo to name
        //unset($events['name']); //don't send the old eventName
        return $events;
    }
}
