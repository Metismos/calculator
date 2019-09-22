<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class FrontendController extends AbstractController
{
    /**
     * Re-routes to the frontend
     * @Route("/")
     * @Route("{route}", requirements={"route"="^(?!(admin|api|login_check|_wdt|_profiler))([\w-\/]+)?"}))
     */
    public function index(Request $request)
    {
        return new Response(file_get_contents(__DIR__.'/../../public/index.html'));
    }
}