<?php

namespace AppBundle\Service;

use AppBundle\Entity\Expense;
use Doctrine\ORM\EntityManager;

class ExpenseService
{

    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Expense[]|array
     */
    public function findAll()
    {
        return $this->entityManager->getRepository(Expense::class)->findAll();
    }

    /**
     * @param Expense $expense
     */
    public function createExpense(Expense $expense)
    {
        $this->entityManager->getRepository(Expense::class)->save($expense);
    }

}