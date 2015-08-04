<?php

/**
 * @category GW2-Legendary
 * @package HierarchyHelper.php
 *
 * @author David Yell <neon1024@gmail.com>
 * @when 29/07/15
 *
 */

namespace App\View\Helper;

use Cake\Utility\Inflector;
use Cake\View\Helper;

class HierarchyHelper extends Helper
{
    public function tree($thread, &$out = null)
    {
        if (!empty($thread) && is_array($thread)) {
            $out .= "<ul>";
            foreach ($thread as $item) {
                $out .= "<li data-name='{$item->ingredient->slug}'><span><input type='number' maxlength='3' size='3' min='0' max='{$item->quantity}' data-id='{$item->id}' data-name='" . urlencode($item->ingredient->name) . "'>/" . $item->quantity . ' ' . $item->ingredient->name;
                $out .= "<div class='progress'><div class='progress-bar' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0%;'>0%</div></div>";
                $out .= '</span>';
                if (!empty($item->children)) {
                    $this->tree($item->children, $out);
                }
                $out .= "</li>";
            }
            $out .= "</ul>";
        }

        return $out;
    }
}