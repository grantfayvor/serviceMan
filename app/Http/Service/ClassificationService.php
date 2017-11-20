<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 18/11/2017
 * Time: 07:19 PM
 */

namespace App\Service;


class ClassificationService
{


    public function matchCloseMechanics($userLocation, array $mechanics)
    {
        $userLocationSplit = preg_split('[ ]', $userLocation);
        $countOfUserLocationSplit = count($userLocationSplit);
        $closeMechanics = array();

        foreach ($mechanics as $mechanic) {
            $mechanicLocationSplit = preg_split('[ ]', $mechanic->location);
            $countOfMechanicLocationSplit = count($mechanicLocationSplit);
            for ($i = $countOfMechanicLocationSplit; $i > 0; $i--) {
                for ($j = $countOfUserLocationSplit; $j > 0; $j++) {
//                    substr_compare()
                    if ($userLocationSplit[$j - 1] == $mechanicLocationSplit[$i - 1]) {
                        array_push($closeMechanics, $mechanic->user_id);
                        break;
                    }
                }
            }
        }
        return $closeMechanics;
    }

}