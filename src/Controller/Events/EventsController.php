<?php

namespace App\Controller\Events;

use App\Entity\Events;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

        return $this->renderForm('events/show.html.twig', [
            'event' => $event,
        ]);
    }
}
