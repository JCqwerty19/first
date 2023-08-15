<?php

namespace App\Services\User;

class Service
{
    // Update user settings
    public function update($data, $user)
    {
        unset($data['old_password']);
        $user->update($data);
    }
}