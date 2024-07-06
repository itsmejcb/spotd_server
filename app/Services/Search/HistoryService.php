<?php

namespace App\Services\Search;

use App\Class\Keys;
use App\Class\Utils;
use App\Models\User;
use App\Models\UserHistory;
use App\Repositories\Search\HistoryRepository;

class HistoryService
{
    protected $historyRepository;
    protected $key;
    protected $util;

    public function __construct(HistoryRepository $historyRepository, Keys $keys, Utils $utils)
    {
        $this->historyRepository = $historyRepository;
        $this->key = $keys;
        $this->util = $utils;
    }

    public function searchHistory(array $data): ?UserHistory
    {
        $user = User::find(1);
        $id = $user->id;

        return $this->historyRepository->searchHistory([
            $this->key->UserID => $id,
        ]);
    }
}
