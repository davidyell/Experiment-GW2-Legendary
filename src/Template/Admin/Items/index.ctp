<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
    </ul>
</div>
<div class="items index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('name') ?></th>
            <th><?= $this->Paginator->sort('quantity') ?></th>
            <th><?= $this->Paginator->sort('parent_id') ?></th>
            <th><?= $this->Paginator->sort('lft') ?></th>
            <th><?= $this->Paginator->sort('rght') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $this->Number->format($item->id) ?></td>
            <td><?= h($item->name) ?></td>
            <td><?= $this->Number->format($item->quantity) ?></td>
            <td>
                <?= $item->has('parent_item') ? $this->Html->link($item->parent_item->name, ['controller' => 'Items', 'action' => 'view', $item->parent_item->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($item->lft) ?></td>
            <td><?= $this->Number->format($item->rght) ?></td>
            <td><?= h($item->created) ?></td>
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
