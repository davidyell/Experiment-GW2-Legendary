<?php

/**
 * @category GW2-Legendary
 * @package ItemsController.php
 *
 * @author David Yell <neon1024@gmail.com>
 * @when 29/07/15
 *
 */

namespace App\Controller;

class ItemsController extends AppController
{
    public function view()
    {
        $item = $this->Items->get(1);

        $children = $this->Items->find('children', ['for' => 1])
            ->find('threaded');

        $this->set(compact('item', 'children'));
    }
}