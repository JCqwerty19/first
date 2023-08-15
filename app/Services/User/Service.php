<?php

namespace App\Services\User;

class Service
{
    // Update user settings
    public function update($data, $user)
    {
        //dd($data);
        $user->update($data);
    }
}