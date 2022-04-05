<?php

namespace App\Controller\Events;

use App\Entity\Events;
use App\Form\InscriptionEventsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventsController extends AbstractController
{
    #[Route('/event/{slug}', name: 'event_show')]
    public function show(?Events $event): Response
    {
        if (!$event) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render('events/show.html.twig', [
            'event' => $event,
        ]);
    }

    #[Route('/event/{slug}/inscription', name: 'event_registration')]
    public function inscription(Request $request, Events $event, EntityManagerInterface $em): Response
    {
//        $inscription = new Inscription();

//        $form = $this->createForm(InscriptionEventsType::class, $inscription);
        $form = $this->createForm(InscriptionEventsType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

//            $inscription->setEvent($event);

//            $em->persist($inscription);
//            $em->flush();

            $this->addFlash('success', "Merci, vous êtes inscrit !");

            return $this->redirectToRoute('event_show', [
                'slug' => $event->getSlug()
            ]);
        }

        return $this->render('test.html.twig', [
            'event' => $event
        ]);
    }
}
