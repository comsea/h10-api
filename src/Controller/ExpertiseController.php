<?php

namespace App\Controller;

use App\Entity\Expertise;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExpertiseController extends AbstractController
{
    #[Route('api/createExpertise', name: 'app_expertises', methods: ['POST', 'GET'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $expert = new Expertise();

        $expert->setTitle($data['title']);
        $expert->setDescription($data['description']);

        $entityManager->persist($expert);
        $entityManager->flush();

        return new Response('Expertise created', Response::HTTP_CREATED);
    }
}
