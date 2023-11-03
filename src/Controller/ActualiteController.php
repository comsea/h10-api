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

        $uploadedImage = $request->files->get('image');

        if ($uploadedImage) {
            $newFilename = 'generate_unique_filename.' . $uploadedImage->guessExtension();

            // Déplacez le fichier téléchargé dans un répertoire approprié
            $uploadedImage->move(
                $this->getParameter('app.upload_dir'), // Configurez le répertoire dans services.yaml
                $newFilename
            );

            // Assurez-vous que votre entité Actualite a une propriété pour stocker le nom du fichier de l'image
            $actu->setImage($newFilename);
        }

        $actu->setCreatedAt(new \DateTimeImmutable());
        $actu->setUpdatedAt(new \DateTimeImmutable());

        $entityManager->persist($actu);
        $entityManager->flush();

        return new Response('Actualité created', Response::HTTP_CREATED);
    }
}