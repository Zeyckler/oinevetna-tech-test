<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @return Response
     */
    public function createNewExpenseAction(Request $request)
    {
        $utilService = $this->get('util_service');
        $result = $utilService->jsonToExpense($request->getContent());
        if ($result) {
            $response = new JsonResponse('OK');
        } else {
            $response = new JsonResponse('KO', Response::HTTP_BAD_REQUEST);
        }
        return $response;
    }

    /**
     * @return Response
     */
    public function expenseListAction()
    {
        $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
        $expenseService = $this->get('expense_service');
        $expenseCollection = $expenseService->findAll();
        $jsonContent = $serializer->serialize($expenseCollection, 'json');

        $response = new Response(
            $jsonContent,
            Response::HTTP_CREATED,
            [
                'Content-Type' => 'application/json',
                'Access-Control-Allow-Origin' => '*',
            ]
        );

        return $response;
    }
}
