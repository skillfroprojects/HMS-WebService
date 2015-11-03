<?php

function mt_rand_str ($l, $c = 'ABCDEFGHIJKLMNOPQRSTYVWXYZabcdefghijklmnopqrstuvwxyz1234567890') {
    for ($s = '', $cl = strlen($c)-1, $i = 0; $i < $l; $s .= $c[mt_rand(0, $cl)], ++$i);
    return $s;
}

//echo mt_rand_str(8); // Something like mp2tmpsw
echo mt_rand_str(10); // Something like B9CD0F
