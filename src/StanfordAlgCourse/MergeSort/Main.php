<?php

namespace StanfordAlgCourse\MergeSort;

class Main {

    /**
     * Sorts array with O(n*log(n)) time complexity
     *
     * @param array $A
     * @return array
     */
    public function mergeSort(array $A)
    {
        // Base case
        if (count($A) == 1) return $A;

        $res1 = $this->mergeSort(array_slice($A, 0, floor(count($A) / 2)));
        $res2 = $this->mergeSort(array_slice($A, floor(count($A) / 2), ceil(count($A) / 2)));

        return $this->merge($res1, $res2);
    }

    /**
     * Merges two sorted arrays to one
     *
     * @param array $A1
     * @param array $A2
     * @return array
     */
    private function merge(array $A1, array $A2)
    {
        $i = $j = $in = 0;
        $res = [];
        while ($i < count($A1) || $j < count($A2))
        {
            if ($i < count($A1) && ($j >= count($A2) || $A1[$i] < $A2[$j]))
            {
                $res[] = $A1[$i];
                $i ++;
            } else
            {
                $res[] = $A2[$j];
                $j ++;
            }
        }

        return $res;
    }
}