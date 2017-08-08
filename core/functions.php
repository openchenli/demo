<?php

function dd($data)
{

    echo "<pre>" . print_r($data, true) . "</pre>";
    exit;
}

/**
 * Formats a JSON string for pretty printing
 *
 * @param string $json The JSON to make pretty
 * @param bool $html Insert nonbreaking spaces and <br />s for tabs and linebreaks
 * @return string The prettified output
 */
function formatJson($json, $html = false)
{
    header('Content-type:text/json');
    $json = json_encode(json_decode($json), JSON_UNESCAPED_UNICODE);
    $tabCount = 0;
    $result = '';
    $inQuote = false;
    $ignoreNext = false;
    if ($html) {
        $tab = "   ";
        $newline = "<br/>";
    } else {
        $tab = "\t";
        $newline = "\n";
    }
    for ($i = 0; $i < strlen($json); $i++) {
        $char = $json[$i];
        if ($ignoreNext) {
            $result .= $char;
            $ignoreNext = false;
        } else {
            switch ($char) {
                case '{':
                    $tabCount++;
                    $result .= $char . $newline . str_repeat($tab, $tabCount);
                    break;
                case '}':
                    $tabCount--;
                    $result = trim($result) . $newline . str_repeat($tab, $tabCount) . $char;
                    break;
                case ',':
                    $result .= $char . $newline . str_repeat($tab, $tabCount);
                    break;
                case '"':
                    $inQuote = !$inQuote;
                    $result .= $char;
                    break;
                case '\\':
                    if ($inQuote) $ignoreNext = true;
                    $result .= $char;
                    break;
                default:
                    $result .= $char;
            }
        }
    }

    return $result;
}

function env($code, $val = '')
{
    $value = getenv($code);
    return $value ? $value : $val;
}

function config($code)
{
    $database = include APP_PATH . '/config/database.php';
    $aes = include APP_PATH . '/config/aes.php';

    if(isset($database[$code]) && isset($aes[$code])){
        $config = array_merge($aes[$code],$database[$code]);
    }

    if(isset($database[$code]) && !isset($aes[$code])){
        $config = $database[$code];
    }

    if(!isset($database[$code]) && isset($aes[$code])){
        $config = $aes[$code];
    }

    return $config;
}


function post($url, $params)
{
    $curlPost = $params;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}