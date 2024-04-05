<?php 

namespace App\Application\Command;


class CreatePostCommand {
  protected string $title;
  protected string $content;

  public function __construct($title, $content) {
    $this->title = $title;
    $this->content = $content;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function setTitle(string $title): self
  {
    $this->title = $title;

    return $this;
  }

  public function getContent(): string
  {
    return $this->content;
  }

  public function setContent(string $content): self
  {
    $this->content = $content;

    return $this;
  }
}