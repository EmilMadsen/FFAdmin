<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:46
 */
class MeasuredIngredient
{
    private $measuredIngredientId;
    private $ingredients; // array of class
    private $amount;
    private $measure;

    /**
     * MeasuredIngredient constructor.
     * @param $measuredIngredientId
     * @param $ingredients
     * @param $amount
     * @param $measure
     */
    public function __construct($measuredIngredientId, $ingredients, $amount, $measure)
    {
        $this->measuredIngredientId = $measuredIngredientId;
        $this->ingredients = $ingredients;
        $this->amount = $amount;
        $this->measure = $measure;
    }

    /**
     * @return mixed
     */
    public function getMeasuredIngredientId()
    {
        return $this->measuredIngredientId;
    }

    /**
     * @param mixed $measuredIngredientId
     */
    public function setMeasuredIngredientId($measuredIngredientId)
    {
        $this->measuredIngredientId = $measuredIngredientId;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getMeasure()
    {
        return $this->measure;
    }

    /**
     * @param mixed $measure
     */
    public function setMeasure($measure)
    {
        $this->measure = $measure;
    }




}