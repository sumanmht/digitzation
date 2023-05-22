<?php

namespace app\components;
use yii\widgets\LinkPager;
use yii\helpers\Html;


class CustomPager extends LinkPager
{
    public $options = ['class' => 'pagination justify-content-center'];
    public $linkOptions = ['class' => 'page-link'];
    public $disabledListItemSubTagOptions = ['tag' => 'a', 'class' => 'page-link'];

    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = $class === 'page-item' ? $this->linkOptions : $this->disabledListItemSubTagOptions;
        $options['data-page'] = $page;

        if ($active) {
            $options['aria-current'] = 'page';
            $options['class'] .= ' active';
        }

        if ($disabled) {
            $options['aria-disabled'] = 'true';
            $options['tabindex'] = '-1';
            $options['class'] .= ' disabled';
        }

        return '<li class="' . $class . '">' . Html::a($label, $this->pagination->createUrl($page), $options) . '</li>';
    }
}


?>