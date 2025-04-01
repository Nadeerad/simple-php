<?php


require 'vendor/autoload.php';

use App\OpenAiService;
use App\Stratergies\DataStratergyInterface;
use App\Stratergies\TextStratergy;
use App\Stratergies\JsonStratergy;


$config = require('config/config.php');

$inputType = $_GET['type'] ?? 'text';

$data = $_GET['data'];
 echo "stage 3 - post";
// var_dump($data);
// exit();

try {
    switch ($inputType) {
        case 'json':
            $stratergy = new JsonStratergy();
            break;
        case 'text': 
            $stratergy = new TextStratergy();
            break;
        default:
            $stratergy = new JsonStratergy();
    }
} catch(Exception $e){
    echo "error".$e->getMessage();
}

echo "here 2";
//echo 'key'.$config['openai_api_key'];
$service = new OpenAiService($config['openai_api_key'], $stratergy);
echo "here 3";
$response = $service->analyzData($data);
echo "here 4";


?>