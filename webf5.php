<?PHP
$POST_DATA = array(
    'id' => 202209211005,
    'vote_id' => 5
);
$m = 0;
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://happyrodents.net/tweet_ranking/vote/?id=202209211005&vote_id=5');
curl_setopt($curl, CURLOPT_POST, TRUE);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($POST_DATA));
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE); 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE); 
for ($n = 1 ; $n <= 100000 ; $n++){
    usleep(50000); // 0.05秒待つ
    $result = curl_exec($curl);
    $httpcode = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
    if ($httpcode == 200){
        $m++;
        if ($m % 1000 == 0) {
            echo $m . "回OK<br>";
        }
    } else {
        echo 'NG' . $n . curl_error($curl);
    }
    ob_flush();
    flush();
}

