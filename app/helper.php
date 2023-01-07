<?php

if(!function_exists('isOpened')) 
{
    function isOpened($now, $openedAt, $closedAt)
    {
        $now = \Carbon\Carbon::parse($now);
        $openedAt = \Carbon\Carbon::parse($openedAt);
        $closedAt = \Carbon\Carbon::parse($closedAt);

        if($openedAt->gt($closedAt)) $closedAt->addDay(); 

        return $now->between($openedAt, $closedAt);;
    }
}