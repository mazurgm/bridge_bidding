<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Classes\Cards;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        /*
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello Email')
            ->setFrom('mazur221@tlen.pl')
            ->setTo('mazur221@tlen.pl')
            ->setBody("sssss",
                'text/html'
            );

        $this->get('mailer')->send($message);
        */
        // replace this example code with whatever you need

        /*backup cards
        $cards2 = new Cards2();
        //var_dump($cards->getDeck());
        $cards2->shuffleDeck();
        echo "<pre>";
        var_dump($cards2->distributeCards());
        echo "</pre>";
        */




        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/play", name="play")
     */
    public function playAction(Request $request)
    {

        $cards = new Cards();
        //var_dump($cards->getDeck());
        $cards->shuffleDeck();
        $cards->distributeCards();

        /*
        echo "Karty gracza North:<br />";
        echo "<pre>";
        var_dump($cards->getNorthPlayerCards());
        echo "</pre>";

        echo "Karty gracza East:<br />";
        echo "<pre>";
        var_dump($cards->getEastPlayerCards());
        echo "</pre>";

        echo "Karty gracza South:<br />";
        echo "<pre>";
        var_dump($cards->getSouthPlayerCards());
        echo "</pre>";

        echo "Karty gracza West:<br />";
        echo "<pre>";
        var_dump($cards->getWestPlayerCards());
        echo "</pre>";

        */

        return $this->render('default/play.html.twig', array(
            'North_hand' => $cards->getNorthPlayerCards(),
            'East_hand' => $cards->getEastPlayerCards(),
            'South_hand' => $cards->getSouthPlayerCards(),
            'West_hand' => $cards->getWestPlayerCards(),

        ));

    }
}
