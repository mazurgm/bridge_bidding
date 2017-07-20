<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;
use AppBundle\Entity\Panstwo;
use AppBundle\Entity\Kontynent;

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



        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/play", name="play")
     */
    public function playAction(Request $request)
    {

        //$userManager = $this->container->get('fos_user.user_manager');
        //var_dump($userManager);

        /*
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        echo "<pre>";
        var_dump($user);
        echo "</pre>";

        */
        $manager = $this->getDoctrine()->getManager();

        try {
            $Kontynent = new Kontynent();
            $Kontynent->setNazwa('Europa');
            $manager->persist($Kontynent);
        }
        catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

            $Panstwo = new Panstwo();
            $Panstwo->setNazwa('Polska');
            $Panstwo->setKontynent($Kontynent);
            $manager->persist($Panstwo);

            $manager->flush();


        $hands = $this->container->get('HandsGenerator');

        return $this->render('default/play.html.twig', array(
            'North_hand' => $hands->getNorthPlayerCards(),
            'East_hand' => $hands->getEastPlayerCards(),
            'South_hand' => $hands->getSouthPlayerCards(),
            'West_hand' => $hands->getWestPlayerCards(),

        ));

    }
}
