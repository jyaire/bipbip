<?php

namespace App\Controller;

use App\Repository\OrganismsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param OrganismsRepository $organismsRepository
     * @return Response
     */
    public function index(OrganismsRepository $organismsRepository)
    {
        $organisms = $organismsRepository->findAll();

        $randomIDOrganisms = array_rand($organisms, 3);

        $randomOrganisms = [];
        $randIDOrgLength = count($randomIDOrganisms);
        for ($i = 0; $i < $randIDOrgLength; $i++) {
            $randomOrganisms[] = $organisms[$randomIDOrganisms[$i]];
        }


        return $this->render('home/index.html.twig', [
            'organisms' => $randomOrganisms
        ]);
    }

    /**
     * @Route("infos/bipbip", name="qui-sommes-nous")
     */
    public function who()
    {
        return $this->render('infos/bipbip.html.twig');
    }

    /**
     * @Route("infos/recrute", name="recrute")
     */
    public function recrute()
    {
        return $this->render('infos/recrute.html.twig');
    }

    /**
     * @Route("admin/", name="adminIndex")
     */
    public function adminIndex()
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("infos/cgu", name="cgu")
     */
    public function cgu()
    {
        return $this->render('infos/cgu.html.twig');
    }

    /**
     * @Route("admin/bdc", name="bdc")
     */
    public function bdc()
    {
        return $this->render('bdc/index.html.twig');
    }

    /**
     * @Route("admin/bdc/{id]", name="bdcShow")
     */
    public function bdcShow()
    {
        return $this->render('bdc/bdc.html.twig');
    }

    /**
     * @Route("autres", name="autres")
     */
    public function autres()
    {
        return $this->render('estimation/autres.html.twig');
    }

    /**
     * @Route("/randomPartners", name="random", methods={"GET"})
     * @param OrganismsRepository $organismsRepository
     * @return Response
     */

    public function randomPartners(OrganismsRepository $organismsRepository): Response
    {
        $organisms = $organismsRepository->findAll();
        $randonmOrganisms = shuffle($organisms);
        $randOrganism = array_slice((array)$randonmOrganisms, 0, 3);

        return $this->render('home/index.html.twig', [
            'organisms' => $randOrganism,
        ]);
    }
}
