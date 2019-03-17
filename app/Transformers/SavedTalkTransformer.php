<?php

namespace App\Transformers;

use App\SavedTalk;
use League\Fractal\TransformerAbstract;

class SavedTalkTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(SavedTalk $savedTalk)
    {
        $savedTalks = $savedTalk->toArray();
        return $savedTalks;
    }
}
