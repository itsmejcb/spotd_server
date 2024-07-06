<?php

namespace App\Services\Notification;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Models\UserNotification;
use App\Repository\Notification\NotificationRepository;

class NotificationService
{
    protected $postRepository;
    protected $key;
    protected $util;

    public function __construct(NotificationRepository $postRepository, Keys $keys, Utils $utils)
    {
        $this->postRepository = $postRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function fetchNotification(array $data): UserNotification
    {
        $user = User::find(1);
        $id = $user->id;

        return $this->postRepository->fetchNotification([
            $this->key->UserID => $id,
        ]);
    }
}
