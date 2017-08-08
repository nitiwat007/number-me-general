<?php

//echo "Test Roles";

function CallAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}

// $method="GET";
// $app_id="720053c0-2faa-11e7-8127-45355c1349cc";
// $username="nitiwat.t";
// $url="http://api.phuket.psu.ac.th/roleprovider/service/getroles/".$app_id."/".$username;
// $result=CallAPI($method,$url);
// $json_data = json_decode($result, true);
// echo count($json_data["result"]);
//echo $json_data["result"][0]["role_id"];
?>
