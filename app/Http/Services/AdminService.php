<?php

namespace App\Services;

use App\Models\Comptable;
use App\Models\User;
use App\Services\Contracts\IAdminService;
use Illuminate\Support\Facades\Hash;

class AdminService implements IAdminService
{
    public function registerComptable(array $data): Comptable
    {
        $user = User::create([
            'name' => $data['first_name'] . ' ' . $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2 // Comptable role ID
        ]);

        $comptable = Comptable::create([
            'user_id' => $user->id,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number' => $data['phone_number'],
            'status' => 'active'
        ]);

        return $comptable;
    }
}