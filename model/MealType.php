<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:34
 */
class MealType
{
    private $mealTypeId;
    private $mealTypeName;
    private $published;

    /**
     * MealType constructor.
     * @param $mealTypeId
     * @param $mealTypeName
     */
    public function __construct($mealTypeId=null, $mealTypeName=null, $published=null)
    {
        $this->mealTypeId = $mealTypeId;
        $this->mealTypeName = $mealTypeName;
        $this->published = $published;
    }

    /**
     * @return mixed
     */
    public function getMealTypeId()
    {
        return $this->mealTypeId;
    }

    /**
     * @param mixed $mealTypeId
     */
    public function setMealTypeId($mealTypeId)
    {
        $this->mealTypeId = $mealTypeId;
    }

    /**
     * @return mixed
     */
    public function getMealTypeName()
    {
        return $this->mealTypeName;
    }

    /**
     * @param mixed $mealTypeName
     */
    public function setMealTypeName($mealTypeName)
    {
        $this->mealTypeName = $mealTypeName;
    }

    /**
     * @return null
     */
    public function getPublished()
    {
        return var_export($this->published, true);
    }

    /**
     * @param null $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }



    public static function getMealTypes()
    {
        include ('../../controller/APIController.php');
        $url = '/mealTypes';

        $wrapper = getFromApi($url);
        $mealtypes = [];

        if(isset($wrapper))
        {
            foreach ($wrapper as $wrap)
            {
                foreach ($wrap as $innerMealType)
                {
                    $tempMealType = new MealType($innerMealType['mealTypeId'], $innerMealType['mealTypeName'], $innerMealType['published']);
                    $mealtypes[] = $tempMealType;
                }
            }
        }

        return $mealtypes;

    }


}