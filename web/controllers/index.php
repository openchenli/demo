<?php
namespace web\controllers;

use core\view;
use Qiniu\Auth;
use Qiniu\Storage\BucketManager;

class index
{

    protected $view;

    public function __construct()
    {
        $this->view = new view();
    }

    public function show()
    {
        $this->view->with('version', '版本 1.0.0 &copy; copyright by open');
        return $this->view->make('index');
    }


    public function test()
    {
        $accessKey = 'PwBKdnov1zXR4V-gN9_NBJ8wWi8LHkOuWkf6lPaG';
        $secretKey = 'bFXphs5dk6H7cQcAeOlu7czj_25ZOdE5GcPM3DsI';
        $auth = new Auth($accessKey, $secretKey);
        $bucketMgr = new BucketManager($auth);

        // http://developer.qiniu.com/docs/v6/api/reference/rs/list.html#list-description
        // 要列取的空间名称
        $bucket = 'devtest';

        // 要列取文件的公共前缀
        $prefix = '';

        // 上次列举返回的位置标记，作为本次列举的起点信息。
        $marker = '';

        // 本次列举的条目数
        $limit = 3;

        // 列举文件
        list($iterms, $marker, $err) = $bucketMgr->listFiles($bucket, $prefix, $marker, $limit);
        if ($err !== null) {
            //echo "\n====> list file err: \n";
            dd($err);
        } else {
            /*echo "Marker: $marker\n";
            echo "\nList Iterms====>\n";*/
            dd($iterms);
        }


        foreach ($iterms as $iterm) {
           echo  "<img src = 'http://otwqibu03.bkt.clouddn.com/{$iterm["key"]}?imageMogr2/thumbnail/180x180/extent/180x180/background/d2hpdGU='>";
        }
    }

}