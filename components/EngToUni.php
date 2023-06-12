<?php

namespace app\components;

use yii\base\Component;

class EngToUni extends Component
{
    public function convert($number)
    {
        $UniNums = [
            '0' => '०',
            '1' => '१',
            '2' => '२',
            '3' => '३',
            '4' => '४',
            '5' => '५',
            '6' => '६',
            '7' => '७',
            '8' => '८',
            '9' => '९',
        ];

        $formattedNumber = '';
        $digits = str_split($number);
        foreach ($digits as $digit) {
            if (isset($UniNums[$digit])) {
                $formattedNumber .= $UniNums[$digit];
            } else {
                $formattedNumber .= $digit;
            }
        }

        return $formattedNumber;
    }
}
