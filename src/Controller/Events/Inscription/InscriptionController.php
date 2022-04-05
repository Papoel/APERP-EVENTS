<?php

namespace App\Controller\Events\Inscription;

use App\Entity\Events;
use App\Entity\Inscription;
use App\Form\InscriptionFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/event/{slug}/inscription', name: 'event_registration')]
    public function inscription(
        Request $request,
        Events $event,
        EntityManagerInterface $em): Response {

        $inscription = new Inscription();

        $form = $this->createForm(InscriptionFormType::class, $inscription);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $event->setCapacity($event->getCapacity() - 1 );

            $this->addFlash('success', "Merci, vous êtes inscrit !");

            $em->persist($inscription);
            $em->flush();


            return $this->redirectToRoute('event_show', [
                'slug' => $event->getSlug()
            ]);
        }


        return $this->renderForm(
            'events/inscription/index.html.twig',
            compact(
                'event',
                'form'
            )
        );
    }
}
