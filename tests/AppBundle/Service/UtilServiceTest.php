<?php

namespace AppBundle\Test;


use AppBundle\Service\ExpenseService;
use AppBundle\Service\UtilService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UtilServiceTest extends WebTestCase
{

    /**
     * @var EntityManagerInterface
     */
    protected $entityManager;

    /**
     * @var Client
     */
    protected $client;

    /**
     * @var ExpenseService
     */
    protected $expenseService;

    /**
     * @var UtilService
     */
    protected $utilService;

    public function setUp()
    {
        static::bootKernel();
        $this->entityManager = static::$kernel
            ->getContainer()
            ->get('doctrine')
            ->getManager();

        //Delete all rows from the property table
        $this->entityManager
            ->createQuery('DELETE FROM AppBundle:Expense')
            ->execute();
        $this->expenseService = new ExpenseService($this->entityManager);
        $this->utilService = new UtilService($this->expenseService);
    }

    public function testJsonToExpense()
    {
        $this->utilService->jsonToExpense(
            file_get_contents(__DIR__ . '/TestJson/BadFormatedJson.json')
        );
        $this->assertCount(0, $this->expenseService->findAll());

        $this->utilService->jsonToExpense(
            file_get_contents(__DIR__ . '/TestJson/ValidJson.json')
        );
        $this->assertCount(1, $this->expenseService->findAll());

    }

}
