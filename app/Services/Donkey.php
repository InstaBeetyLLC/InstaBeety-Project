<?php

namespace App\Services;

class Donkey
{
    /**
     * @param $object
     * @param $fieldName
     * @return array
     */
    public static function getIndexOfObject($object, $fieldName)
    {
        $targetArray = [];
        foreach ($object as $index) {
            $targetArray[] = $index->{$fieldName};
        }
        return $targetArray;
    }
}