<?php

namespace AppBundle\Entity;

/**
 * Expense
 */
class Expense
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $expense;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Expense
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set expense
     *
     * @param string $expense
     *
     * @return Expense
     */
    public function setExpense($expense)
    {
        $this->expense = $expense;

        return $this;
    }

    /**
     * Get expense
     *
     * @return string
     */
    public function getExpense()
    {
        return $this->expense;
    }
}

