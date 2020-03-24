<?php


namespace App\Controller;

use App\Entity\Visit;
use App\Form\VisitFormType;
use App\Repository\DoctorRepository;
use App\Repository\VisitRepository;
use App\Repository\VisitRepositoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class VisitController extends AbstractController
{
    /**
     * @Route("/add-visit")
     * @return Response
     */
    public function addVisit(EntityManagerInterface $entityManager, Request $request): Response
    {
        $this->denyAccessUnlessGranted('ROLE_PATIENT');
        $visit= new Visit();
        $visitForm=$this->createForm(VisitFormType::class,$visit);
        $visitForm->handleRequest($request);
        if($visitForm->isSubmitted() && $visitForm->isValid()){
            $entityManager->persist($visit);
            $endDate= clone $visit->getStartDate();
            $endDate->add(new \DateInterval('PT1H'));
            $visit->setPatient($this->getUser());
            $visit->setEndDate($endDate);
            $entityManager->flush();

            return $this->redirectToRoute('app_visit_listvisit');
        }
        return $this->render('visit/add.html.twig',['visitForm'=>$visitForm->createView()]);
    }

    /**
     * @Route("/list-visits")
     * @param VisitRepository $visitRepository
     * @return Response
     */
    public function listVisit(VisitRepository $visitRepository):Response{
        $this->denyAccessUnlessGranted('ROLE_PATIENT');
        $visits = $visitRepository->findByPatient($this->getUser());
        return $this->render('visit/list.html.twig',['visits' => $visits]);
    }

    /**
     * @Route("/list-visits-doctor")
     * @param DoctorRepository $doctorRepository
     * @return Response
     */
    public function listVisitDoctor(VisitRepository $visitRepository):Response{
        $this->denyAccessUnlessGranted('ROLE_DOCTOR');
        $doctor = $visitRepository->findByDoctor($this->getUser());
        return $this->render('visit/list.html.twig',['visits' => $doctor]);
    }
}