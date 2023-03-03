<?php

namespace App\Interfaces;

use App\Http\Requests\StoreAccountRequest;

interface HistoryRepositoryInterface {
    public function getHistoryByUserId($account_id);
}