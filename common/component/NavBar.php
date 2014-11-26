<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 2014/10/12
 * Time: 13:41
 */
Yii::import('bootstrap.widgets.TbNavbar');

class NavBar extends TbNavbar
{
    /**
     * @var string
     */
    public $collapseName;

    /**
     *### .run()
     *
     * Runs the widget.
     */
    public function run()
    {
        echo CHtml::openTag('div', $this->htmlOptions);
        echo '<div class="navbar-inner"><div class="' . $this->getContainerCssClass() . '">';

        $collapseId = null === $this->collapseName ? '#' . TbCollapse::getNextContainerId() : $this->collapseName;

        if ($this->collapse !== false) {
            echo '<a class="btn btn-navbar" data-toggle="collapse" data-target="' . $collapseId . '">';
            echo '<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>';
            echo '</a>';
        }

        if ($this->brand !== false) {
            if ($this->brandUrl !== false) {
                echo CHtml::openTag('a', $this->brandOptions) . $this->brand . '</a>';
            } else {
                unset($this->brandOptions['href']); // spans cannot have a href attribute
                echo CHtml::openTag('span', $this->brandOptions) . $this->brand . '</span>';
            }
        }

        foreach ($this->items as $item) {
            if (is_string($item)) {
                echo $item;
            } else {
                if (isset($item['class'])) {
                    $className = $item['class'];
                    unset($item['class']);

                    $this->controller->widget($className, $item);
                }
            }
        }

        echo '</div></div></div>';
    }
} 