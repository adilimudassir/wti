<?php

namespace App\Repositories;

trait RepositoryTrait
{
    protected array $excludedFields = [];

    protected function removeEmptyFieldsFromArray($array)
    {
        $newArrayWithoutEmptyValues = [];

        foreach ($array as $key => $value) {
            if (filled($value)) {
                $newArrayWithoutEmptyValues[$key] = $value;
            }
        }

        return $newArrayWithoutEmptyValues;
    }

    protected function generateKeyValuePairs($array, $data)
    {
        $newArray = [];

        $array = $this->removeItemFromArray($array, ['user_id', ...$this->excludedFields]);

        foreach ($array as $value) {
            $newArray[$value] = $data[$value];
        }

        return $newArray;
    }

    protected function removeItemFromArray(array $array, array $fields)
    {
        foreach ($array as $key => $value) {
            foreach ($fields as $field) {
                if ($value == $field) {
                    unset($array[$key]);
                }
            }
        }

        return $array;
    }

    protected function fields($data)
    {
        return $this->removeEmptyFieldsFromArray(
            $this->generateKeyValuePairs(
                $this->model->getModelFields(),
                $data
            )
        );
    }
}
