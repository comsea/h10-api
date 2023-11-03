<?php

namespace App\Controller;

use App\Entity\Adresse;
use App\Entity\Cabinet;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdresseController extends AbstractController
{
    #[Route('api/createAdresse', name: 'app_adresses', methods: ['POST', 'GET'])]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = $request->getContent();
        $data = json_decode($data, true);

        $dataCabinet = $entityManager->getRepository(Cabinet::class)->find($data['cabinet']);

        $adresse = new Adresse();

        $adresse->setName($data['name']);
        $adresse->setEmail($data['email']);
        $adresse->setAdress($data['adress']);
        $adresse->setWebsite($data['website']);
        $adresse->setGooglemaps($data['googlemaps']);
        $adresse->setPhone($data['phone']);
        $adresse->setCabinet($dataCabinet);

        $entityManager->persist($adresse);
        $entityManager->flush();

        return new Response('Adresse created', Response::HTTP_CREATED);
    }
}
