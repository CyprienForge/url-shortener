<?php

namespace App\Infrastructure\Symfony\Controller;

use App\Application\Command\AddNewUrl\AddNewUrlCommand;
use App\Application\Query\RedirectToUrl\RedirectToUrlQuery;
use App\Domain\Request\AddNewUrl\AddNewUrlRequest;
use App\Domain\Request\RedirectToUrl\RedirectToUrlRequest;
use App\Infrastructure\Symfony\Form\UrlForm;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UrlShortenerController extends AbstractController
{

    #[Route('/{hashUrl}', name: 'app_redirect')]
    public function redirectTo(string $hashUrl, RedirectToUrlQuery $useCase) : Response
    {
        try{
            $response = $useCase->execute(new RedirectToUrlRequest($hashUrl));
        }catch(EntityNotFoundException $e){
            $this->addFlash('error', "Cette url est introuvable !");
            return $this->redirectToRoute('app_redirect');
        }
        catch(\Exception $e){
            $this->addFlash('error', "Une erreur innatendue est survenue !");
            return $this->redirectToRoute('app_redirect');
        }
        return $this->redirect($response->url);
    }

    #[Route('/', name: 'app_short')]
    public function shortUrl(Request $request, AddNewUrlCommand $useCase) : Response
    {
        $form = $this->createForm(UrlForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $newForm = $this->createForm(UrlForm::class);

            $response = $useCase->execute(new AddNewUrlRequest($data['url']));
            return $this->render('home.html.twig', [
                'form' => $newForm->createView(),
                'shortUrl' => $response->shortUrl,
            ]);
        }

        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
