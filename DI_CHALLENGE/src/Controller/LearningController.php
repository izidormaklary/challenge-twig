<?php

namespace App\Controller;


use App\Services\Capitalizer;
use App\Services\Dasher;
use App\Services\Logger;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use App\Services\Masterclass;



class LearningController extends AbstractController
{
    /**
     * @Route("/", name="learning")
     */


    public function index(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('message', TextType::class)
            ->add('transform', ChoiceType::class, [
                'choices'  => [
                    'D-asher' => 0,
                    'CaPiTalIzEr' => 1,
                    'B-o-T-h' => 2,
                ],
            ])
            ->add('log', SubmitType::class, ['label' => 'Log message'])
            ->getForm();

        $form->handleRequest($request);
        $message="";
        if ($form->isSubmitted() && $form->isValid()) {
            $input = $form->getData();

            $transform = [ new Dasher(), new Capitalizer];
            $masterclass = new Masterclass($transform[$input['transform']], new Logger);
            $message =  $masterclass->ChangeAndLog($input['message']);
        }


        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
            'form' => $form->createView(),
            'message'=> $message
        ]);
    }
}
