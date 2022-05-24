<?php
    //queryArray
    $ch = curl_init();
    $url = "https://qiita.com/api/v2/items?page=1&per_page=10&query=tag%3Apython+or+tag%3Aphp+or+tag%3Aruby+or+tag%3Ahtml+or+tag%3Acss+or+tag%3ALinux+or+tag%3AGitLaby";
    $curlHandle = curl_init($url);
    $headers = [''];
    // オプションを設定
    curl_setopt($ch,CURLOPT_URL,$url); // 取得するURLを指定
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true); // 実行結果を文字列で返す
    curl_setopt($curlHandle,CURLOPT_HTTPHEADER,$headers); //リクエストヘッダに追加する
    // URLの情報を取得
    $httprequest = json_decode(curl_exec($ch),false);
    foreach($httprequest as $reques){
        foreach($reques as $kye => $value){
            if($kye == "title" || $kye == "url") $responseList[] = $value;
        }
    }
    // 新着リストの連想配列を整列
    foreach($responseList as $kye => $value){
        $arraySortList[] = $value;
        if(count($arraySortList) == 2){
            $newArrivalList[] = [$arraySortList[0] => $arraySortList[1]];
            $arraySortList = [];
        }
    }
?>
