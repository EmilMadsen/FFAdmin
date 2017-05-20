<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:48
 */
class Menu
{

    private $menuId;
    private $menuName;
    private $menuDescription;
    private $menuImageFilePath;
    private $mealType; //class
    private $published;
    private $publisherId;
    private $publisherName;
    private $recipes; //array of class

    public function __construct($menuId, $menuName, $menuDescription, $menuImageFilePath, $mealType, $published, $publisherId, $publisherName, $recipes)
    {
        $this->menuId = $menuId;
        $this->menuName = $menuName;
        $this->menuDescription = $menuDescription;
        $this->menuImageFilePath = $menuImageFilePath;
        $this->mealType = $mealType;
        $this->published = $published;
        $this->publisherId = $publisherId;
        $this->publisherName = $publisherName;
        $this->recipes = $recipes;
    }

    /**
     * @return mixed
     */
    public function getMenuId()
    {
        return $this->menuId;
    }

    /**
     * @param mixed $menuId
     */
    public function setMenuId($menuId)
    {
        $this->menuId = $menuId;
    }

    /**
     * @return mixed
     */
    public function getMenuName()
    {
        return $this->menuName;
    }

    /**
     * @param mixed $menuName
     */
    public function setMenuName($menuName)
    {
        $this->menuName = $menuName;
    }

    /**
     * @return mixed
     */
    public function getMenuDescription()
    {
        return $this->menuDescription;
    }

    /**
     * @param mixed $menuDescription
     */
    public function setMenuDescription($menuDescription)
    {
        $this->menuDescription = $menuDescription;
    }

    /**
     * @return mixed
     */
    public function getMenuImageFilePath()
    {
        return $this->menuImageFilePath;
    }

    /**
     * @param mixed $menuImageFilePath
     */
    public function setMenuImageFilePath($menuImageFilePath)
    {
        $this->menuImageFilePath = $menuImageFilePath;
    }

    /**
     * @return mixed
     */
    public function getMealType()
    {
        return $this->mealType;
    }

    /**
     * @param mixed $mealType
     */
    public function setMealType($mealType)
    {
        $this->mealType = $mealType;
    }

    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param mixed $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getPublisherId()
    {
        return $this->publisherId;
    }

    /**
     * @param mixed $publisherId
     */
    public function setPublisherId($publisherId)
    {
        $this->publisherId = $publisherId;
    }

    /**
     * @return mixed
     */
    public function getPublisherName()
    {
        return $this->publisherName;
    }

    /**
     * @param mixed $publisherName
     */
    public function setPublisherName($publisherName)
    {
        $this->publisherName = $publisherName;
    }

    /**
     * @return mixed
     */
    public function getRecipes()
    {
        return $this->recipes;
    }

    /**
     * @param mixed $recipes
     */
    public function setRecipes($recipes)
    {
        $this->recipes = $recipes;
    }




}