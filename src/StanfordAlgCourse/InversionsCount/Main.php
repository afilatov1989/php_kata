<?php

namespace StanfordAlgCourse\InversionsCount;

class Main {

    /**
     * Wrapper for countInversions. Returns number of inversions without sorted array
     *
     * @param array $A
     * @return mixed
     */
    public function countInv(array $A)
    {
        return $this->countInversions($A)['in'];
    }

    /**
     * main recursive function
     *
     * @param array $A
     * @return array
     */
    private function countInversions(array $A)
    {
        // Base case
        if (count($A) == 1) return ['in' => 0, 'arr' => $A];

        $res1 = $this->countInversions(array_slice($A, 0, floor(count($A) / 2)));
        $res2 = $this->countInversions(array_slice($A, floor(count($A) / 2), ceil(count($A) / 2)));
        $res3 = $this->mergeAndCountInversions($res1['arr'], $res2['arr']);

        return ['in' => $res1['in'] + $res2['in'] + $res3['in'], 'arr' => $res3['arr']];

    }

    /**
     * Merges two sorted arrays to one and returns
     * array itself + number of inversions BETWEEN two arrays
     *
     * @param array $A1
     * @param array $A2
     * @return array
     */
    private function mergeAndCountInversions(array $A1, array $A2)
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
                $in += count($A1) - $i;
            }
        }

        return ['in' => $in, 'arr' => $res];
    }
}