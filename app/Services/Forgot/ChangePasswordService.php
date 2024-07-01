<?php

namespace App\Services\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Repositories\Forgot\ChangePasswordRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordService
{
    protected $changePasswordRepository;
    protected $key;
    protected $util;

    public function __construct(ChangePasswordRepository $changePasswordRepository, Keys $keys, Utils $utils)
    {
        $this->changePasswordRepository = $changePasswordRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function forgotChangePassword(array $data)
    {
        $user = Auth::user();
        $id = $user->id;

        $password = $this->util->clean($data[$this->key->Password]);

        return $this->changePasswordRepository->forgotChangePassword([
            $this->key->UserID => $id,
            $this->key->Password => Hash::make($password),
        ]);
    }
}
