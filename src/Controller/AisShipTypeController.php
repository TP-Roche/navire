<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AisShipTypeRepository;
use Symfony\Component\HttpFoundation\Request;

#[Route('/aisshiptype', name: 'aisshiptype')]
class AisShipTypeController extends AbstractController {

    #[Route('/voirtous', name: 'voirtous')]
    public function voirTous(AisShipTypeRepository $repoAisShipType): Response {
        $aisShipTypes = $repoAisShipType->findAll();
        return $this->render('aisshiptype/voirtous.html.twig', [
                    'aisShipTypes' => $aisShipTypes,
        ]);
    }

    #[Route('/portscompatibles', name: ' portscompatibles')]
    public function portsCompatibles(Request $request, AisShipTypeRepository $repoAisShipType): Response {
        $aisShipType = $repoAisShipType->find($request->get('id'));
        $infoPortPays = $repoAisShipType->getPortPaysInfoByAisShipTypeId($aisShipType);
        return $this->render('aisshiptype/portscompatibles.html.twig', [
                    'aisShipTypes' => $aisShipType,
                    'portPays' => $infoPortPays,
        ]);
    }
}
