<?php

/**
 * History Interface
 *
 * @author  Michael <resourcemode@yahoo.com>
 */

namespace App\Repositories\History;

interface HistoryInterface
{
    public function fetchById($historyId);

    public function fetchByUserId($userId);

    public function fetchAll();

    public function fetchByIdWithUser($historyId);
}