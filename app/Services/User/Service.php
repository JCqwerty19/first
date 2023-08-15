<?php

namespace App\Services\User;

class Service
{
    public function update($data, $user)
    {
        unset($data['old_password']);
        $user->update($data);
    }
}