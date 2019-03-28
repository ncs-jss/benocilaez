<?php
function custom_url($arg)
{
    if (substr($arg, 0, 1) != "/") {
        $arg = "/".$arg;
    }
    return "".$arg;
}
