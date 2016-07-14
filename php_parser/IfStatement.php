<?php

/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 12/07/2016
 * Time: 16:37
 */
class IfStatement implements iExpression
{

    /**
     * @var BooleanExpression
     * The boolean expression that determines whether the if condition is true or false.
     */
    private $boolExpression;

    /**
     * @var ThenExpression
     * The instructions that are carried out if the boolean expression is determined true.
     */
    private $thenConstructor;

    /**
     * @var array
     * The instructions that are carried out if the boolean expression is determined false
     * Or an else if structure is defined.
     */
    private $elseConstructors;

    /**
     * @return mixed
     */
    public function getElseConstructors()
    {
        return $this->elseConstructors;
    }

    /**
     * @param mixed $elseConstructor
     */
    public function setElseConstructor($elseConstructor)
    {
        $this->elseConstructors = $elseConstructor;
    }

    /**
     * Adds another else constructor to this objects array of else constructors.
     * @param $elseConstructor
     * The else constructor to add to the array.
     */
    public function addToElseConstructors($elseConstructor) {
        array_push($this->elseConstructors, $elseConstructor);
    }

    /**
     * @return mixed
     */
    public function getThenConstructor()
    {
        return $this->thenConstructor;
    }

    /**
     * @param mixed $thenConstructor
     */
    public function setThenConstructor($thenConstructor)
    {
        $this->thenConstructor = $thenConstructor;
    }

    /**
     * @return mixed
     */
    public function getBoolExpression()
    {
        return $this->boolExpression;
    }

    /**
     * @param mixed $boolExpression
     */
    public function setBoolExpression($boolExpression)
    {
        $this->boolExpression = $boolExpression;
    }

    public function evaluate()
    {
        // TODO: Implement evaluate() method.
    }

    public function __toString()
    {
        //the string formed of all of the else statements in the expression.
        $elseString = "";

        //append all of the else statements as strings to the else string to be printed for this if statement
        foreach($this->elseConstructors as $elseStat) {
            $elseString = $elseString . $elseStat->__toString();
        }

        return $this->boolExpression->__toString() . $this->thenConstructor->__toString() . $elseString;
    }


}