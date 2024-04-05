<?php

namespace App\Application\Port\Database;

use App\Domain\Model\Post;

interface PostDatabasePort {
  
  public function save(Post $post, bool $flush = false): void;
  
  public function findOneById(int $id): Post;

}
