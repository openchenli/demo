<?php

function dd($data)
{
    echo "<pre>" . print_r($data, true) . "</pre>";
}

function convertUrlQuery($query)
{
    $queryParts = explode('&', $query);
    $params = array();
    foreach ($queryParts as $param) {
        $item = explode('=', $param);
        $params[$item[0]] = $item[1];
    }
    return $params;
}