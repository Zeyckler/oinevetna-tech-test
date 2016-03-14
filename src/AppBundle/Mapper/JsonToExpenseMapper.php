<?php

namespace AppBundle\Mapper;

use AppBundle\Entity\Expense;

class JsonToExpenseMapper
{
    /**
     * @param array $array
     * @return Expense
     */
    public function jsonToExpense(array $array)
    {
        $expense = (new Expense())
            ->setDescription($array[0]['value'])
            ->setExpense($array[1]['value']);

        return $expense;
    }

}