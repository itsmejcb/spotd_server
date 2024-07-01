<?php

namespace App\Services\Forgot;

use App\Class\Keys;
use App\Class\Utils;
use App\Repositories\Forgot\EmailRepository;

class EmailService
{
    protected $emailRepository;
    protected $key;
    protected $util;

    public function __construct(EmailRepository $emailRepository, Keys $keys, Utils $utils)
    {
        $this->emailRepository = $emailRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function forgotEmail(array $data)
    {
        $email = $this->util->clean($data[$this->key->Email]);

        return $this->emailRepository->forgotEmail([
            'email' => $email,
        ]);
    }
}
