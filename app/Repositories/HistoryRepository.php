<?php

namespace App\Repositories;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\HistoryRepositoryInterface;
use App\Models\History;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HistoryRepository implements HistoryRepositoryInterface
{
    private History $history;

    public function __construct(History $history)
    {
        $this->history = $history;
    }

    public function getHistoryByUserId($id)
    {
        return $this->history->where('user_id', $id)->paginate(10);
    }

}