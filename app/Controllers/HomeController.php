<?php

namespace App\Controllers;

class HomeController
{
    public function __invoke(): array
    {
        return [
            'code' => 1000,
            'status' => 'success',
            'message' => 'Welcome to API'
        ];
    }
}