<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Expense;
use Doctrine\ORM\EntityRepository;

class ExpenseRepository extends EntityRepository
{
    /**
     * @param Expense $expense
     */
    public function save(Expense $expense)
    {
        $this->getEntityManager()->persist($expense);
        $this->getEntityManager()->flush();
    }
}
