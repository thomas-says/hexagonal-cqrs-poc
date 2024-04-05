<?php

namespace App\Infrastructure\Doctrine\Repository;

use App\Application\Port\Database\PostDatabasePort;
use App\Domain\Model\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PostRepository extends ServiceEntityRepository implements PostDatabasePort
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function save(Post $post, bool $flush = false): void
    {
        $this->getEntityManager()->persist($post);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findOneById(int $id): Post
    {
        return $this->findOneBy(['id' => $id]);
    }
}
