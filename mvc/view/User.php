<?php

namespace View;

class User
{
    public static function render($array)
    {
        echo '
            <H1>User Show</H1>
        ';
        \printf('<h2>User id:</h2> %d<br>
                <h2>User name:</h2> %s<br>',
            $array['id'], $array['name']
            );
    }
}