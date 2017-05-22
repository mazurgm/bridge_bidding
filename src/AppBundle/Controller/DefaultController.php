<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Classes\Cards;
use AppBundle\Services\Deck;
use Symfony\Component\Yaml\Yaml;

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

        //test
        $deck = $this->container->get('Deck');
        //$deck = new Deck();

        //end of test

        $cards = new Cards();
        //var_dump($cards->getDeck());

        //file_put_contents('../src/AppBundle/Resources/Config/cards.yml', Yaml::dump($cards->getDeck()));
        //file_get_contents('../src/AppBundle/Resources/Config/cards.yml');
        // echo $this->get('kernel')->getRootDir();

        $cards->shuffleDeck();
        $cards->distributeCards();


        return $this->render('default/play.html.twig', array(
            'North_hand' => $cards->getNorthPlayerCards(),
            'East_hand' => $cards->getEastPlayerCards(),
            'South_hand' => $cards->getSouthPlayerCards(),
            'West_hand' => $cards->getWestPlayerCards(),

        ));

    }
}
