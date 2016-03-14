<?php

namespace AppBundle\Service;

use AppBundle\Mapper\JsonToExpenseMapper;

class UtilService
{
    /**
     * @var ExpenseService
     */
    private $expenseService;

    /**
     * @param ExpenseService $expenseService
     */
    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }

    /**
     * @param string $json
     * @return bool
     */
    public function jsonToExpense($json)
    {
        $mapper = new JsonToExpenseMapper();
        try {
            $decodedString = json_decode($json, true);
            $expense = $mapper->jsonToExpense($decodedString);
            $this->expenseService->createExpense($expense);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}