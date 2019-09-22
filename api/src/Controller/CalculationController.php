<?php

namespace App\Controller;

use App\Interfaces\CalculationInterface;
use App\Interfaces\OperationInterface;
use App\Interfaces\OperationFactoryInterface;
use App\Interfaces\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Swagger\Annotations as OA;

/**
 * @Route("/api/v1/calculation")
 * 
 * @OA\Tag(name="Calculation")
 */
class CalculationController extends AbstractController
{
    /**
     * @Route("", methods={"POST"})
     * 
     * @OA\Response(
     *      response=200,
     *      description="Calculation executed successfuly.",
     * )
     * @OA\Response(response=400, description="Bad request made with invalid parameters")
     * 
     * @OA\Parameter(ref="#/parameters/firstOperand")
     * @OA\Parameter(ref="#/parameters/secondOperand")
     * @OA\Parameter(ref="#/parameters/operationType")
     */
    public function calculate(
        Request $request,
        OperationFactoryInterface $operationFactory,
        CalculationInterface $calculation,
        ValidatorInterface $validator
    ) {
        $firstOperand = $request->query->get('firstOperand');
        $secondOperand = $request->query->get('secondOperand');
        $operationType = $request->query->get('operationType');

        $validator->validate([
            ['number' => $firstOperand],
            ['number' => $secondOperand],
            ['alphabetic' => $operationType]
        ]);

        $operation = $operationFactory->createOperation($operationType);
        
        $result = $calculation->execute((float)$firstOperand, (float)$secondOperand, $operation);

        return $this->json($result, 200);
    }
}
