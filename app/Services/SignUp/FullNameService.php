<?php

namespace App\Services\SignUp;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Models\UserCredentials;
use App\Repositories\SignUp\FullNameRepository;

class FullNameService
{
    protected $userRepository;
    protected $key;
    protected $util;

    public function __construct(FullNameRepository $userRepository, Keys $keys, Utils $utils)
    {
        $this->userRepository = $userRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function createCredential(array $data): UserCredentials
    {
        $user = User::find(1);
        $id = $user->id;
        $first_name = $this->util->clean($data[$this->key->FirstName]);
        $middle_name = $this->util->clean($data[$this->key->MiddleName]);
        $last_name = $this->util->clean($data[$this->key->LastName]);

        return $this->userRepository->create([
            'user_id' => $id,
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
        ]);
    }
}
