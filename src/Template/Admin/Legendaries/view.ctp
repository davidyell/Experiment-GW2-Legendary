<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Legendary'), ['action' => 'edit', $legendary->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Legendary'), ['action' => 'delete', $legendary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $legendary->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Legendaries'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Legendary'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="legendaries view large-10 medium-9 columns">
    <h2><?= h($legendary->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($legendary->name) ?></p>
            <h6 class="subheader"><?= __('Type') ?></h6>
            <p><?= h($legendary->type) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($legendary->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($legendary->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($legendary->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Items') ?></h4>
    <?php if (!empty($legendary->items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Legendary Id') ?></th>
            <th><?= __('Ingredient Id') ?></th>
            <th><?= __('Quantity') ?></th>
            <th><?= __('Parent Id') ?></th>
            <th><?= __('Lft') ?></th>
            <th><?= __('Rght') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($legendary->items as $items): ?>
        <tr>
            <td><?= h($items->id) ?></td>
            <td><?= h($items->legendary_id) ?></td>
            <td><?= h($items->ingredient_id) ?></td>
            <td><?= h($items->quantity) ?></td>
            <td><?= h($items->parent_id) ?></td>
            <td><?= h($items->lft) ?></td>
            <td><?= h($items->rght) ?></td>
            <td><?= h($items->created) ?></td>
            <td><?= h($items->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
