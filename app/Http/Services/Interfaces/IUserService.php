<?php

namespace App\Http\Services\Interfaces;

interface IUserService 
{
    public function authenticate(array $credentials): string;
    public function logout(): void;
}