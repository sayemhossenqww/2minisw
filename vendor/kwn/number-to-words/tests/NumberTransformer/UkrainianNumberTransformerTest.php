<?php

namespace NumberToWords\NumberTransformer;

class UkrainianNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new UkrainianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [0, 'нуль'],
            [1, 'один'],
            [9, 'дев\'ять'],
            [10, 'десять'],
            [11, 'одинадцять'],
            [19, 'дев\'ятнадцять'],
            [20, 'двадцять'],
            [21, 'двадцять один'],
            [90, 'дев\'яносто'],
            [99, 'дев\'яносто дев\'ять'],
            [100, 'сто'],
            [101, 'сто один'],
            [111, 'сто одинадцять'],
            [120, 'сто двадцять'],
            [121, 'сто двадцять один'],
            [900, 'дев\'ятсот'],
            [909, 'дев\'ятсот дев\'ять'],
            [919, 'дев\'ятсот дев\'ятнадцять'],
            [990, 'дев\'ятсот дев\'яносто'],
            [999, 'дев\'ятсот дев\'яносто дев\'ять'],
            [1000, 'одна тисяча'],
            [2000, 'дві тисячі'],
            [4000, 'чотири тисячі'],
            [5000, 'п\'ять тисяч'],
            [11000, 'одинадцять тисяч'],
            [21000, 'двадцять одна тисяча'],
            [999000, 'дев\'ятсот дев\'яносто дев\'ять тисяч'],
            [999999, 'дев\'ятсот дев\'яносто дев\'ять тисяч дев\'ятсот дев\'яносто дев\'ять'],
            [1000000, 'один мільйон'],
            [2000000, 'два мільйони'],
            [4000000, 'чотири мільйони'],
            [5000000, 'п\'ять мільйонів'],
            [999000000, 'дев\'ятсот дев\'яносто дев\'ять мільйонів'],
            [999000999, 'дев\'ятсот дев\'яносто дев\'ять мільйонів дев\'ятсот дев\'яносто дев\'ять'],
            [999999000, 'дев\'ятсот дев\'яносто дев\'ять мільйонів дев\'ятсот дев\'яносто дев\'ять тисяч'],
            [999999999, 'дев\'ятсот дев\'яносто дев\'ять мільйонів дев\'ятсот дев\'яносто дев\'ять тисяч дев\'ятсот дев\'яносто дев\'ять'],
            [1174315110, 'один мільярд сто сімдесят чотири мільйони триста п\'ятнадцять тисяч сто десять'],
            [1174315119, 'один мільярд сто сімдесят чотири мільйони триста п\'ятнадцять тисяч сто дев\'ятнадцять'],
            [15174315110, 'п\'ятнадцять мільярдів сто сімдесят чотири мільйони триста п\'ятнадцять тисяч сто десять'],
            [35174315119, 'тридцять п\'ять мільярдів сто сімдесят чотири мільйони триста п\'ятнадцять тисяч сто дев\'ятнадцять'],
            [935174315119, 'дев\'ятсот тридцять п\'ять мільярдів сто сімдесят чотири мільйони триста п\'ятнадцять тисяч сто дев\'ятнадцять'],
            [2935174315119, 'два трильйони дев\'ятсот тридцять п\'ять мільярдів сто сімдесят чотири мільйони триста п\'ятнадцять тисяч сто дев\'ятнадцять'],
        ];
    }
}
