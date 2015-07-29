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

use Cake\Network\Exception\NotFoundException;

class ItemsController extends AppController
{
    /**
     * List all the legendaries on the site, so a user can pick the one they want
     *
     * @return void
     */
    public function index()
    {
        $legendaries = $this->Items->Legendaries->find();
        $this->set('legendaries', $legendaries);
    }

    /**
     * View a single legendary by it's slug. Will load the dependant tree data for that item.
     *
     * @param string $slug The lowercase hypenated slug
     * @return void
     */
    public function view($slug)
    {
        $legendary = $this->Items->Legendaries->find()
            ->contain([
                'Items' => function ($q) {
                    return $q->where(['parent_id IS' => null]);
                }
            ])
            ->where(["REPLACE(LOWER(`name`), ' ', '-') =" => $slug])
            ->first();

        if (!$legendary) {
            throw new NotFoundException('Item not found.');
        }

        $this->Items->behaviors()->Tree->config('scope', ['legendary_id' => $legendary->id]);

        $flatChildren = $this->Items->find('children', ['for' => $legendary->items[0]->id])
            ->contain(['Ingredients']);

        $children = $this->Items->find('children', ['for' => $legendary->items[0]->id])
            ->find('threaded')
            ->contain(['Ingredients']);

        $this->set(compact('legendary', 'children', 'flatChildren'));
    }
}