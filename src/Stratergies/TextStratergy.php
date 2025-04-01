<?php
namespace App\Stratergies;

class TextStratergy implements DataStratergyInterface
{
    public function formatData(string $data) : array
    {
        return ['text' => $data];
    }
}