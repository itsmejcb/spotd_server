<?php

namespace App\Services\Search;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Repositories\Search\SearchRepository;

class SearchService
{
    protected $searchRepository;
    protected $key;
    protected $util;

    public function __construct(SearchRepository $searchRepository, Keys $keys, Utils $utils)
    {
        $this->searchRepository = $searchRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function search(array $data): User
    {
        $user = User::find(1);
        $id = $user->id;
        // get the user id to fetch post
        $search = $this->util->clean($data[$this->key->Search]);

        return $this->searchRepository->search([
            $this->key->ID => $id,
            $this->key->Search => $search,
        ]);
    }
}
