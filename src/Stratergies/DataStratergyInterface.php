<?php

namespace App\Stratergies;

interface DataStratergyInterface
{
    public function formatData(string $data): array;
}