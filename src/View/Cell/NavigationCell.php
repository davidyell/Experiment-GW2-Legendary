<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Navigation cell
 */
class NavigationCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Legendaries');
        $this->set(
            'legendaries',
            $this->Legendaries->find()
                ->select(['id', 'name', 'slug'])
        );
    }
}
