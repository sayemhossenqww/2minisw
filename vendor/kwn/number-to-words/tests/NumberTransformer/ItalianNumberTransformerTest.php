<?php

namespace NumberToWords\NumberTransformer;

class ItalianNumberTransformerTest extends NumberTransformerTest
{
    protected function setUp(): void
    {
        $this->numberTransformer = new ItalianNumberTransformer();
    }

    public function providerItConvertsNumbersToWords(): array
    {
        return [
            [-140, 'meno centoquaranta'],
            [0, 'zero'],
            [1, 'uno'],
            [2, 'due'],
            [3, 'tre'],
            [4, 'quattro'],
            [5, 'cinque'],
            [6, 'sei'],
            [7, 'sette'],
            [8, 'otto'],
            [9, 'nove'],
            [10, 'dieci'],
            [11, 'undici'],
            [12, 'dodici'],
            [13, 'tredici'],
            [14, 'quattordici'],
            [15, 'quindici'],
            [16, 'sedici'],
            [17, 'diciassette'],
            [18, 'diciotto'],
            [19, 'diciannove'],
            [20, 'venti'],
            [21, 'ventuno'],
            [22, 'ventidue'],
            [23, 'ventitre'],
            [24, 'ventiquattro'],
            [25, 'venticinque'],
            [26, 'ventisei'],
            [27, 'ventisette'],
            [28, 'ventotto'],
            [29, 'ventinove'],
            [30, 'trenta'],
            [31, 'trentuno'],
            [32, 'trentadue'],
            [33, 'trentatre'],
            [34, 'trentaquattro'],
            [35, 'trentacinque'],
            [36, 'trentasei'],
            [37, 'trentasette'],
            [38, 'trentotto'],
            [39, 'trentanove'],
            [40, 'quaranta'],
            [41, 'quarantuno'],
            [42, 'quarantadue'],
            [43, 'quarantatre'],
            [44, 'quarantaquattro'],
            [45, 'quarantacinque'],
            [46, 'quarantasei'],
            [47, 'quarantasette'],
            [48, 'quarantotto'],
            [49, 'quarantanove'],
            [50, 'cinquanta'],
            [51, 'cinquantuno'],
            [52, 'cinquantadue'],
            [53, 'cinquantatre'],
            [54, 'cinquantaquattro'],
            [55, 'cinquantacinque'],
            [56, 'cinquantasei'],
            [57, 'cinquantasette'],
            [58, 'cinquantotto'],
            [59, 'cinquantanove'],
            [60, 'sessanta'],
            [61, 'sessantuno'],
            [62, 'sessantadue'],
            [63, 'sessantatre'],
            [64, 'sessantaquattro'],
            [65, 'sessantacinque'],
            [66, 'sessantasei'],
            [67, 'sessantasette'],
            [68, 'sessantotto'],
            [69, 'sessantanove'],
            [70, 'settanta'],
            [71, 'settantuno'],
            [72, 'settantadue'],
            [73, 'settantatre'],
            [74, 'settantaquattro'],
            [75, 'settantacinque'],
            [76, 'settantasei'],
            [77, 'settantasette'],
            [78, 'settantotto'],
            [79, 'settantanove'],
            [80, 'ottanta'],
            [81, 'ottantuno'],
            [82, 'ottantadue'],
            [83, 'ottantatre'],
            [84, 'ottantaquattro'],
            [85, 'ottantacinque'],
            [86, 'ottantasei'],
            [87, 'ottantasette'],
            [88, 'ottantotto'],
            [89, 'ottantanove'],
            [90, 'novanta'],
            [91, 'novantuno'],
            [92, 'novantadue'],
            [93, 'novantatre'],
            [94, 'novantaquattro'],
            [95, 'novantacinque'],
            [96, 'novantasei'],
            [97, 'novantasette'],
            [98, 'novantotto'],
            [99, 'novantanove'],
            [100, 'cento'],
            [101, 'centouno'],
            [108, 'centootto'],
            [150, 'centocinquanta'],
            [180, 'centoottanta'],
            [188, 'centoottantotto'],
            [199, 'centonovantanove'],
            [200, 'duecento'],
            [203, 'duecentotre'],
            [208, 'duecentootto'],
            [280, 'duecentoottanta'],
            [287, 'duecentoottantasette'],
            [288, 'duecentoottantotto'],
            [300, 'trecento'],
            [356, 'trecentocinquantasei'],
            [400, 'quattrocento'],
            [410, 'quattrocentodieci'],
            [434, 'quattrocentotrentaquattro'],
            [456, 'quattrocentocinquantasei'],
            [500, 'cinquecento'],
            [578, 'cinquecentosettantotto'],
            [600, 'seicento'],
            [689, 'seicentoottantanove'],
            [700, 'settecento'],
            [729, 'settecentoventinove'],
            [800, 'ottocento'],
            [894, 'ottocentonovantaquattro'],
            [900, 'novecento'],
            [999, 'novecentonovantanove'],
            [1000, 'mille'],
            [1001, 'milleuno'],
            [1002, 'milledue'],
            [1097, 'millenovantasette'],
            [1100, 'millecento'],
            [1104, 'millecentoquattro'],
            [1200, 'milleduecento'],
            [1243, 'milleduecentoquarantatre'],
            [2000, 'duemila'],
            [2385, 'duemilatrecentoottantacinque'],
            [3000, 'tremila'],
            [3766, 'tremilasettecentosessantasei'],
            [4196, 'quattromilacentonovantasei'],
            [5846, 'cinquemilaottocentoquarantasei'],
            [6459, 'seimilaquattrocentocinquantanove'],
            [6827, 'seimilaottocentoventisette'],
            [7232, 'settemiladuecentotrentadue'],
            [8569, 'ottomilacinquecentosessantanove'],
            [9539, 'novemilacinquecentotrentanove'],
            [10000, 'diecimila'],
            [11000, 'undicimila'],
            [100000, 'centomila'],
            [2000000, 'due milioni'],
            [43152000, 'quarantatre milioni centocinquantaduemila']
        ];
    }
}
