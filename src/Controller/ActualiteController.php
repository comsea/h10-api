<?php

namespace App\Controller;

use App\Entity\Actualite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('api/createActualite', name: 'app_actualites', methods: ['POST', 'GET'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $actu = new Actualite();

        $actu->setTitle($data['title']);
        $actu->setDescription($data['description']);

        $imageFile = $request->files->get('image');
        $actu->setImage($imageFile);

        $actu->setCreatedAt(new \DateTimeImmutable());
        $actu->setUpdatedAt(new \DateTimeImmutable());

        $entityManager->persist($actu);
        $entityManager->flush();

        return new Response('Actualité created', Response::HTTP_CREATED);
    }
}
