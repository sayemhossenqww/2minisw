<?php

namespace NumberToWords\NumberTransformer;

class AzerbaijaniNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new AzerbaijaniNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-3, 'mənfi üç'],
            [-9539, 'mənfi doqquz min beş yüz otuz doqquz'],
            [0, 'sıfır'],
            [1, 'bir'],
            [3, 'üç'],
            [8, 'səkkiz'],
            [9, 'doqquz'],
            [10, 'on'],
            [11, 'on bir'],
            [12, 'on iki'],
            [16, 'on altı'],
            [19, 'on doqquz'],
            [20, 'iyirmi'],
            [21, 'iyirmi bir'],
            [25, 'iyirmi beş'],
            [26, 'iyirmi altı'],
            [30, 'otuz'],
            [31, 'otuz bir'],
            [40, 'qırx'],
            [43, 'qırx üç'],
            [50, 'əlli'],
            [55, 'əlli beş'],
            [58, 'əlli səkkiz'],
            [60, 'altmış'],
            [67, 'altmış yeddi'],
            [70, 'yetmiş'],
            [79, 'yetmiş doqquz'],
            [80, 'səksən'],
            [90, 'doxsan'],
            [99, 'doxsan doqquz'],
            [100, 'yüz'],
            [101, 'yüz bir'],
            [102, 'yüz iki'],
            [111, 'yüz on bir'],
            [113, 'yüz on üç'],
            [120, 'yüz iyirmi'],
            [121, 'yüz iyirmi bir'],
            [199, 'yüz doxsan doqquz'],
            [203, 'iki yüz üç'],
            [229, 'iki yüz iyirmi doqquz'],
            [287, 'iki yüz səksən yeddi'],
            [300, 'üç yüz'],
            [356, 'üç yüz əlli altı'],
            [410, 'dörd yüz on'],
            [434, 'dörd yüz otuz dörd'],
            [500, 'beş yüz'],
            [578, 'beş yüz yetmiş səkkiz'],
            [660, 'altı yüz altmış'],
            [666, 'altı yüz altmış altı'],
            [689, 'altı yüz səksən doqquz'],
            [729, 'yeddi yüz iyirmi doqquz'],
            [894, 'səkkiz yüz doxsan dörd'],
            [900, 'doqquz yüz'],
            [909, 'doqquz yüz doqquz'],
            [919, 'doqquz yüz on doqquz'],
            [990, 'doqquz yüz doxsan'],
            [999, 'doqquz yüz doxsan doqquz'],
            [1000, 'bir min'],
            [1001, 'bir min bir'],
            [1010, 'bir min on'],
            [1015, 'bir min on beş'],
            [1097, 'bir min doxsan yeddi'],
            [1100, 'bir min yüz'],
            [1104, 'bir min yüz dörd'],
            [1111, 'bir min yüz on bir'],
            [1243, 'bir min iki yüz qırx üç'],
            [2000, 'iki min'],
            [2385, 'iki min üç yüz səksən beş'],
            [3766, 'üç min yeddi yüz altmış altı'],
            [4000, 'dörd min'],
            [4196, 'dörd min yüz doxsan altı'],
            [4538, 'dörd min beş yüz otuz səkkiz'],
            [5000, 'beş min'],
            [5020, 'beş min iyirmi'],
            [5846, 'beş min səkkiz yüz qırx altı'],
            [6459, 'altı min dörd yüz əlli doqquz'],
            [7232, 'yeddi min iki yüz otuz iki'],
            [8569, 'səkkiz min beş yüz altmış doqquz'],
            [9539, 'doqquz min beş yüz otuz doqquz'],
            [11000, 'on bir min'],
            [11001, 'on bir min bir'],
            [21000, 'iyirmi bir min'],
            [21512, 'iyirmi bir min beş yüz on iki'],
            [90000, 'doxsan min'],
            [92100, 'doxsan iki min yüz'],
            [212112, 'iki yüz on iki min yüz on iki'],
            [720018, 'yeddi yüz iyirmi min on səkkiz'],
            [999000, 'doqquz yüz doxsan doqquz min'],
            [999999, 'doqquz yüz doxsan doqquz min doqquz yüz doxsan doqquz'],
            [1000000, 'bir milyon'],
            [1001001, 'bir milyon bir min bir'],
            [2000000, 'iki milyon'],
            [3248518, 'üç milyon iki yüz qırx səkkiz min beş yüz on səkkiz'],
            [4000000, 'dörd milyon'],
            [5000000, 'beş milyon'],
            [999000000, 'doqquz yüz doxsan doqquz milyon'],
            [999000999, 'doqquz yüz doxsan doqquz milyon doqquz yüz doxsan doqquz'],
            [999999000, 'doqquz yüz doxsan doqquz milyon doqquz yüz doxsan doqquz min'],
            [999999999, 'doqquz yüz doxsan doqquz milyon doqquz yüz doxsan doqquz min doqquz yüz doxsan doqquz'],
            [1174315110, 'bir milyard yüz yetmiş dörd milyon üç yüz on beş min yüz on'],
            [1174315119, 'bir milyard yüz yetmiş dörd milyon üç yüz on beş min yüz on doqquz'],
            [1800000006, 'bir milyard səkkiz yüz milyon altı'],
            [15174315119, 'on beş milyard yüz yetmiş dörd milyon üç yüz on beş min yüz on doqquz'],
            [35174315119, 'otuz beş milyard yüz yetmiş dörd milyon üç yüz on beş min yüz on doqquz'],
            [935174315119, 'doqquz yüz otuz beş milyard yüz yetmiş dörd milyon üç yüz on beş min yüz on doqquz'],
            [2935174315119, 'iki trilyon doqquz yüz otuz beş milyard yüz yetmiş dörd milyon üç yüz on beş min yüz on doqquz'],
        ];
    }
}
