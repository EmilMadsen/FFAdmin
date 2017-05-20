<?php

/**
 * Created by IntelliJ IDEA.
 * User: Emilo
 * Date: 29-04-2017
 * Time: 16:28
 */
class Allergy
{
    private $allergyId;
    private $allergyName;
    private $allergyDescription;
    private $published;


    public function __construct($id=null, $allergyName=null, $allergyDescription=null, $published=null)
    {
        $this->allergyId = $id;
        $this->allergyName = $allergyName;
        $this->allergyDescription = $allergyDescription;
        $this->published = $published;
    }

    public function getAllergyId()
    {
        return $this->allergyId;
    }

    public function setAllergyId($allergyId)
    {
        $this->allergyId = $allergyId;
    }

    public function getAllergyName()
    {
        return $this->allergyName;
    }

    public function setAllergyName($allergyName)
    {
        $this->allergyName = $allergyName;
    }

    public function getAllergyDescription()
    {
        return $this->allergyDescription;
    }

    public function setAllergyDescription($allergyDescription)
    {
        $this->allergyDescription = $allergyDescription;
    }

    public function getPublished()
    {
        return var_export($this->published, true);
//        return $this->published;
    }

    public function setPublished($published)
    {
        $this->published = $published;
    }

    public static function getAllergies()
    {
        include_once ('../../controller/APIController.php');
        $url = '/allergies';

        $allergyWrapper = getFromApi($url);
        $allergies = [];

        //unwrapping the json data
        foreach ($allergyWrapper as $allergy)
        {
            foreach ($allergy as $innerAllergy)
            {
                $tempAllergy = new Allergy($innerAllergy['allergyId'], $innerAllergy['allergyName'],
                    $innerAllergy['allergyDescription'], $innerAllergy['published']);
                $allergies[] = $tempAllergy;
            }
        }

        return $allergies;
    }

    public function getAllergyById($id)
    {
        include_once ('../../controller/APIController.php');
        $url = '/allergies/' . $id;

        $response = getFromApi($url);

        $tempAllergy = null;

        //unwrapping the json data
        $tempAllergy = new Allergy($response['allergyId'], $response['allergyName'],
            $response['allergyDescription'], $response['published']);

//
//        var_dump($tempAllergy);
//        exit;

        return $tempAllergy;
    }

//    public function deleteAllergy($id)
//    {
//        include ('../../controller/APIController.php');
//
//        $url = '/allergies/' . $id;
//
//        $response = deleteFromApi($url);
//
//        header('location: index.php');
//    }

}