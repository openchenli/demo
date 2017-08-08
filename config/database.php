<?php
if(env('OPEN_DEV')){
    return [
        'lr' => [
            'mysql'=>[
                'host' => '10.8.34.155',
                'user'=>'root',
                'database'=>'lr170120',
                'password'=>'pTWCc8yTku'
            ],
        ]
    ];
}
