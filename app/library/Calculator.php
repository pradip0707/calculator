<?php

namespace App\Library;

/**
 * Calculator class
 */
class Calculator {

    /**
     * Addition of given string with numbers
     *
     * @param string $data The data
     * @return int The integer value
     */
    public function add($data)
    {
        $numbers = $this->buildArray($data);
        if (is_array($numbers)) {
            return array_sum($numbers);
        }
        return $numbers;
    }

    /**
     * Multiplication of given string with nunmbers
     *
     * @param string $data The data
     * @return int The integer value
     */
    public function multiply($data)
    {
        $numbers = $this->buildArray($data);
        if (is_array($numbers)) {
            return array_product($numbers);
        }
        return $numbers;
    }

    /**
     * Build array of given string
     *
     * @param string $data The data
     * @return array The array contains numbers
     * @throws \InvalidArgumentException
     */
    private function buildArray($data)
    {
        if (empty($data)) {
            return 0;
        }
        $delimiters = ["\\n", "\n", "n", "\\", "\\;", ";"];
        $data = str_replace($delimiters, ",", $data);
        $numbers = array_map('intval', array_filter(explode(',', $data)));
        if (min($numbers) < 0) {
            $negative = array_filter($numbers, function($x) {
                return $x < 0;
            });
            throw new \InvalidArgumentException("Negative numbers (" . implode(',', $negative) . ") not allowed", 1528100877);
        }
        $numbers = array_filter($numbers, function($number) {
            return $number < 1000;
        });
        return $numbers;
    }

}
