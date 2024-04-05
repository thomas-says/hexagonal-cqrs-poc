<?php 

namespace App\Application\Query;

class GetPostQuery {
  public function __construct(protected int $id) {}

  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): self
  {
    $this->id = $id;

    return $this;
  }
}
