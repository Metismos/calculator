<?php

namespace App\Tests;

use App\Tests\OurWebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CalculationTests extends OurWebTestCase
{
    public function testAdditionSuccess()
    {
        $params = http_build_query([
            'firstOperand' => 10,
            'secondOperand' => 8,
            'operationType' => 'Addition'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");

        $actual = $this->client->getResponse();

        $this->assertEquals($actual->getContent(), 18);
        $this->assertEquals(Response::HTTP_OK, $actual->getStatusCode());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $actual);
    }

    public function testSubtractionSuccess()
    {
        $params = http_build_query([
            'firstOperand' => 10,
            'secondOperand' => 8,
            'operationType' => 'Subtraction'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");

        $actual = $this->client->getResponse();

        $this->assertEquals($actual->getContent(), 2);
        $this->assertEquals(Response::HTTP_OK, $actual->getStatusCode());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $actual);
    }

    public function testMultiplicationSuccess()
    {
        $params = http_build_query([
            'firstOperand' => 10,
            'secondOperand' => 8,
            'operationType' => 'Multiplication'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");

        $actual = $this->client->getResponse();

        $this->assertEquals($actual->getContent(), 80);
        $this->assertEquals(Response::HTTP_OK, $actual->getStatusCode());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $actual);
    }

    public function testDivisionSuccess()
    {
        $params = http_build_query([
            'firstOperand' => 80,
            'secondOperand' => 8,
            'operationType' => 'Division'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");

        $actual = $this->client->getResponse();

        $this->assertEquals($actual->getContent(), 10);
        $this->assertEquals(Response::HTTP_OK, $actual->getStatusCode());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $actual);
    }

    public function testBitwiseAndSuccess()
    {
        $params = http_build_query([
            'firstOperand' => 10,
            'secondOperand' => 8,
            'operationType' => 'BitwiseAnd'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");

        $actual = $this->client->getResponse();

        $this->assertEquals($actual->getContent(), 8);
        $this->assertEquals(Response::HTTP_OK, $actual->getStatusCode());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $actual);
    }

    public function testBitwiseOrSuccess()
    {
        $params = http_build_query([
            'firstOperand' => 10,
            'secondOperand' => 8,
            'operationType' => 'BitwiseOr'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");

        $actual = $this->client->getResponse();

        $this->assertEquals($actual->getContent(), 10);
        $this->assertEquals(Response::HTTP_OK, $actual->getStatusCode());
        $this->assertInstanceOf('Symfony\Component\HttpFoundation\JsonResponse', $actual);
    }

    public function testCalculationOperationTypeFailure()
    {
        $this->expectException(\InvalidArgumentException::class);

        $params = http_build_query([
            'firstOperand' => 10,
            'secondOperand' => 8,
            'operationType' => 'NotValid'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");
    }

    public function testCalculationOperationOperandFailure()
    {
        $this->expectException(\InvalidArgumentException::class);
        
        $params = http_build_query([
            'firstOperand' => 'NotValid',
            'secondOperand' => 8,
            'operationType' => 'Addition'
        ]);

        $this->client->request('POST', "/api/v1/calculation?$params");
    }
}
