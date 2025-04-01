<?php
namespace App;

use OpenAi;
use App\Stratergies\DataStratergyInterface;

class OpenAiService 
{
    private $client;
    private $stratergy;

    public function __construct(string $apiKey, DataStratergyInterface $stratergy)
    {
        echo "I open AI service";
        $this->client = OpenAI::client($apiKey);
        $this->stratergy = $stratergy;
    }

    public function analyzData(string $data): string
    {
        echo "in analyzData";
        $formatteredData = $this->stratergy->formatData($data);
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'Analyze the given data and provide insights.'],
                ['role' => 'user', 'content' => json_encode($formattedData)],
            ],
        ]);

        var_dump($response);
        exit;
    }
}