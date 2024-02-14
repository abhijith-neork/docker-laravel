<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => ['2', '3', '4', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'm', 'n', 'p', 'q', 'r', 't', 'u', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'X', 'Y', 'Z'],
    'default' => [
        'length' => 4,
        'width' => 120,
        'height' => 36,
        'quality' => 100,
        'math' => false,
        'expire' => 60,
        'encrypt' => false,
        'blur' => 0,
        'sharpen' => 30,
        'contrast' => -3,
        'bgColor' => '#ffffff',
        'fontColors' => ['#000000'],
        'lines' => false,
        'bgImage' => false,
        'contrast' => 100,


    ],
    
];
