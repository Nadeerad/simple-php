<?php
namespace App\Stratergies;

class JsonStratergy implements DataStratergyInterface
{
    public function formatData(string $data) : array
    {
        return json_decode($data, true) ?? ['error' => 'Invalid Json'];
    }
}