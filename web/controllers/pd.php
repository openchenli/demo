<?php
namespace web\controllers;
class pd extends controller
{

    /**
     * 同步库存
     */
    public function synchronize()
    {
        $config = config('pd');

        $item['sku'] = '2352885';
        $item['vat'] = 0.6;
        $data['items'][] = $item;

        $data['version'] = '1.0.0.1';
        $data['provider_code'] = $config['aes']['provide_code'];

        $aes = $this->aes();
        $content = base64_encode($aes->encrypt(json_encode($data)));
        $content = urlencode($content);
        $md5Key = $config['aes']['md5_key'];
        $sign = md5($content . $md5Key);
        $url = $config['aes']['sync_product_url'];
        $params = "sign=$sign&content=$content";
        echo formatJson(post($url, $params));
    }


}