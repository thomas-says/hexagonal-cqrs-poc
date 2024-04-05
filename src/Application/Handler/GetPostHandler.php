<?php

namespace App\Application\Handler;

use App\Application\Port\Database\PostDatabasePort;
use App\Application\Query\GetPostQuery;
use App\Domain\Model\Post;

class GetPostHandler {
  public function __construct(
    protected PostDatabasePort $databasePort
  ) {
  }

  public function handle(GetPostQuery $query): Post {
    return $this->databasePort->findOneById($query->getId());
  }
}