<?php

function isPjax()
{
    return FALSE;
}

function asset($url)
{
    return url($url);
}


function url($url)
{
    return base_url($url);
}