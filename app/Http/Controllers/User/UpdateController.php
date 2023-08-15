<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();

        $this->service->update($data, $user);

        $variables =
        [
            'user' => $user,
        ];
        return redirect()->route('users.profile', $user);
    }
}
