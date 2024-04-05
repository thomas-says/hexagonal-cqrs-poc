<?php

namespace App\Application\Handler;

use App\Application\Command\CreatePostCommand;
use App\Application\Port\Database\PostDatabasePort;
use App\Domain\Model\Post;

class CreatePostHandler {
  public function __construct(
    protected PostDatabasePort $databasePort
  ) {
  }

  public function handle(CreatePostCommand $command): Post {
    $post = new Post();

    $post
      ->setTitle($command->getTitle())
      ->setContent($command->getContent());
    
    $this->databasePort->save($post, true);

    return $post;
  }
}