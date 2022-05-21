<?php declare( strict_types = 1 );

namespace PhpRandomTest;


class MethodAbstract
{

    protected function _calculate(int $generations, int $words_per_generation, int $word_length, callable $random) :MethodResult
    {

        $result = new MethodResult;

        for($a=1;$a<=$generations;$a++)
        {

            $randoms = [];

            for($b=1;$b<=$words_per_generation;$b++)
            {
                $randoms[] = $random($word_length);
            }

            $repeated = $words_per_generation - count(array_unique($randoms));

            unset($randoms); //free memory

            $result->setRepeatedWords($a, $repeated, $words_per_generation);
        }
        
        return $result;
    }
}