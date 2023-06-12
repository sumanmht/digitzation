<?php

namespace app\components;

use yii\base\Component;

class UniToEng extends Component
{
    public function convert($num)
    {
        $EngNums = [
            '०' => '0',
            '१' => '1',
            '२' => '2',
            '३' => '3',
            '४' => '4',
            '५' => '5',
            '६' => '6',
            '७' => '7',
            '८' => '8',
            '९' => '9',
        ];

        $formattedNum = '';
        $digits = str_split($num);
        foreach ($digits as $digit) {
            if (isset($EngNums[$digit])) {
                $formattedNum .= $EngNums[$digit];
            } else {
                $formattedNum .= $digit;
            }
        }

        return $formattedNum;
    }
}
