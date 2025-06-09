<?php

namespace App\Services\Contracts;

use App\Models\Comptable;

interface IAdminService
{
    public function registerComptable(array $data): Comptable;
}