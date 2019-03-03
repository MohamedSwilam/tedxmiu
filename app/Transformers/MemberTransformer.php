<?php

namespace App\Transformers;

use App\Member;
use League\Fractal\TransformerAbstract;

class MemberTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Member $member)
    {
        $members = $member->toArray();
        return $members;
    }
}
