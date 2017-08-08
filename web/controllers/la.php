<?php
namespace web\controllers;
class la extends controller
{




    /**
     * 查找订单
     */
    public function searchOrder()
    {

        $config = config('lr');

        $data['downloaded'] = 'no';
        $aes = $this->aes();
        $data['version'] = '1.0.0.1';
        $data['provider_code'] = $config['aes']['provide_code'];
        $data['order_type'] = 'processing';
        $data['per_number'] = 1;
        $content = base64_encode($aes->encrypt(json_encode($data)));
        $content = urlencode($content);
        $sign = md5($content . $config['aes']['md5_key']);
        $url = $config['aes']['search_order_url'];
        $params = "sign=$sign&content=$content";
        echo formatJson(post($url, $params));
    }




}