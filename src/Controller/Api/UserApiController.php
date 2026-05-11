<?php

namespace App\Controller\Api;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

class UserApiController extends AbstractController
{
    #[Route('/api/user/upload', name: 'api_user_upload', methods: ['POST'])]
    public function upload(Request $request, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['error' => 'Unauthorized'], 401);
        }

        $file = $request->files->get('image');

        if (!$file) {
            return $this->json(['error' => 'No file'], 400);
        }

        $user->setImageFile($file);
        $em->flush();

        return $this->json([
            'imageName' => $user->getImageName()
        ]);
    }

    #[Route('/api/user/delete-image', name: 'api_user_delete_image', methods: ['DELETE'])]
    public function deleteImage(EntityManagerInterface $em): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['error' => 'Unauthorized'], 401);
        }

        $imageName = $user->getImageName();

        if ($imageName) {

            $imagePath = $this->getParameter('kernel.project_dir') . '/public/uploads/users/' . $imageName;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }


            $user->setImageFile(null);
            $user->setImageName(null);
            $user->setUpdatedAt(new \DateTimeImmutable());
        }

        $em->flush();

        return $this->json(['message' => 'Image deleted']);
    }

    #[Route('/api/me', name: 'api_me', methods: ['GET'])]
    public function me(): Response
    {
        $user = $this->getUser();

        if (!$user) {
            return $this->json(['error' => 'Unauthorized'], 401);
        }

        return $this->json([
            'username' => $user->getUsername(),
            'imageName' => $user->getImageName(),
        ]);
    }

}
