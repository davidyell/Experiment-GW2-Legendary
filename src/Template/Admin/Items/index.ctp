<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Legendaries'), ['controller' => 'Legendaries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Legendary'), ['controller' => 'Legendaries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingredients'), ['controller' => 'Ingredients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingredient'), ['controller' => 'Ingredients', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="items index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('legendary_id') ?></th>
            <th><?= $this->Paginator->sort('ingredient_id') ?></th>
            <th><?= $this->Paginator->sort('quantity') ?></th>
            <th><?= $this->Paginator->sort('parent_id') ?></th>
            <th><?= $this->Paginator->sort('lft') ?></th>
            <th><?= $this->Paginator->sort('rght') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $this->Number->format($item->id) ?></td>
            <td>
                <?= $item->has('legendary') ? $this->Html->link($item->legendary->name, ['controller' => 'Legendaries', 'action' => 'view', $item->legendary->id]) : '' ?>
            </td>
            <td>
                <?= $item->has('ingredient') ? $this->Html->link($item->ingredient->name, ['controller' => 'Ingredients', 'action' => 'view', $item->ingredient->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($item->quantity) ?></td>
            <td>
                <?= $item->has('parent_item') ? $this->Html->link($item->parent_item->name, ['controller' => 'Items', 'action' => 'view', $item->parent_item->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($item->lft) ?></td>
            <td><?= $this->Number->format($item->rght) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
