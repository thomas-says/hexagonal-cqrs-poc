<?php 

namespace App\Infrastructure\Symfony\Controller\API;

use App\Application\Query\GetPostQuery;
use App\Application\Handler\GetPostHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GetPostController extends AbstractController
{
    public function __construct(protected GetPostHandler $handler) {
    }

    #[Route('/posts/{id}', name: 'get_post', methods: ['GET'])]
    public function __invoke(int $id): Response
    {
        $post = $this->handler->handle(new GetPostQuery($id));

        return $this->json($post);
    }
}