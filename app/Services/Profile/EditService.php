<?php

namespace App\Services\Profile;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Models\UserCredentials;
use App\Models\UserProfile;
use App\Models\UserUsername;
use App\Repositories\Profile\EditRepository;

class EditService
{
    protected $editRepository;
    protected $key;
    protected $util;

    public function __construct(EditRepository $editRepository, Keys $keys, Utils $utils)
    {
        $this->editRepository = $editRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function editUsername(array $data): UserUsername
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $username = $this->util->clean($data[$this->key->Username]);

        return $this->editRepository->editUsername([
            $this->key->ID => $id,
            $this->key->UserID => $username,
        ]);
    }
    public function editCredentials(array $data): UserCredentials
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $first_name = $this->util->clean($data[$this->key->FirstName]);
        $middle_name = $this->util->clean($data[$this->key->MiddleName]);
        $last_name = $this->util->clean($data[$this->key->LastName]);

        return $this->editRepository->editCredentials([
            $this->key->ID => $id,
            $this->key->FirstName => $first_name,
            $this->key->MiddleName => $middle_name,
            $this->key->LastName => $last_name,
        ]);
    }
    public function editProfile(array $data): UserProfile
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $extension = $this->util->clean($data[$this->key->Extension]);

        return $this->editRepository->editProfile([
            $this->key->ID => $id,
            $this->key->Extension => $extension,
        ]);
    }
}
