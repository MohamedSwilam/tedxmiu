<?php

namespace App\Transformers;

use App\Talk;
use League\Fractal\TransformerAbstract;

class TalkTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Talk $talk)
    {
        $talks = $talk->toArray();
        return $talks;
    }
}
