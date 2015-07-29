<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $legendary->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $legendary->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Legendaries'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="legendaries form large-10 medium-9 columns">
    <?= $this->Form->create($legendary) ?>
    <fieldset>
        <legend><?= __('Edit Legendary') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
