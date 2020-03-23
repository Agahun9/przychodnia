<?php

namespace App\Controller;

use App\Repository\DoctorRepository;
use App\Repository\PatientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\VisitRepository;
class SiteController extends AbstractController
{
    /**
     * @Route("/", name="site")
     */
    public function index(VisitRepository $visitRepository,DoctorRepository $doctorRepository,PatientRepository $patientRepository)
    {
        return $this->render('site/index.html.twig', [
            'controller_name' => 'SiteController',
            'allvisits' => $visitRepository->allVisits(),
            'alldoctors' => $doctorRepository->allDoctors(),
            'allpatients' => $patientRepository->allPatients()
        ]);
    }
}
