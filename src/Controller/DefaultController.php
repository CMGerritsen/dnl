<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default", methods={"POST", "GET"})
     */
    public function index(\Swift_Mailer $mailer)
    {
        if (isset($_POST['submit'])) {
            $message = (new \Swift_Message('Je hebt een vraag / opmerking van ' . $_POST['naam']))
                ->setFrom($_POST['email'])
                ->setTo($this->getParameter('mail_parameter'))
                ->setBody(
                    $_POST['inhoud'],
                    'text/plain'
                );
            $mailer->send($message);

            return $this->render('default/mailSucces.html.twig');
        }

        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/regels", name="regels")
     */
    public function regels()
    {
        return $this->render('default/regels.html.twig', [
        ]);
    }

    /**
     * @Route("/social", name="social")
     */
    public function social()
    {
        return $this->render('default/social.html.twig', [
        ]);
    }

    /**
     * @Route("/nieuws", name="nieuws")
     */
    public function shownews(NewsRepository $newsRepository)
    {
        return $this->render('default/showpost.html.twig', [
            'news' => $newsRepository->findAll()
        ]);
    }
}
