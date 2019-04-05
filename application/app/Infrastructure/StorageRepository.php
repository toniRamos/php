<?php

namespace App\Infrastructure;

interface StorageRepository{
    public function get(string $username, int $limit): array;
    public function set(string $username, int $limit, array $textSave);
}