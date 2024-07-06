<?php

namespace App\Services\Home;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\Post;
use App\Repositories\Home\ForyouRepository;
use Illuminate\Support\Facades\Auth;

class ForyouService
{
    protected $foryouRepository;
    protected $key;
    protected $util;

    public function __construct(ForyouRepository $foryouRepository, Keys $keys, Utils $utils)
    {
        $this->foryouRepository = $foryouRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function homeForyou(array $data): Post
    {
        $user = Auth::user();
        $id = $user->id;

        return $this->foryouRepository->homeForyou([
            $this->key->UserID => $id,
        ]);
    }
}