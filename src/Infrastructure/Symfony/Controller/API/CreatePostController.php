<?php 

namespace App\Infrastructure\Symfony\Controller\API;

use App\Application\Command\CreatePostCommand;
use App\Application\Handler\CreatePostHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class CreatePostController extends AbstractController
{
    public function __construct(protected CreatePostHandler $handler) 
    {
    }

    #[Route('/posts', name: 'create_post', methods: ['POST'])]
    public function __invoke(#[MapRequestPayload] CreatePostCommand $command): Response
    {
        $post = $this->handler->handle($command);

        return $this->json($post);
    }
}