<?php
if(env('OPEN_DEV')){
    return [
        'lr' => [
            'aes'=>[
                'provide_code'=>'LA',
                'md5_key'=>'ds495#lijh@*lr*da28sm9',
                'search_order_url'=>'http://lr-backend.azoyagroup.com/m_sales/order/search'
            ]
        ],
        'pd' => [
            'aes'=>[
                'provide_code'=>'pd',
                'md5_key'=>'QWE-12QEDS-@*pd',
                'sync_product_url'=>'http://pd.azoya.org/m_catalog/product/synchronize'
            ]
        ]
    ];
}
