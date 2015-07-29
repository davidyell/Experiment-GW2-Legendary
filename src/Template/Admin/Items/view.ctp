<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="items view large-10 medium-9 columns">
    <h2><?= h($item->name) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Name') ?></h6>
            <p><?= h($item->name) ?></p>
            <h6 class="subheader"><?= __('Parent Item') ?></h6>
            <p><?= $item->has('parent_item') ? $this->Html->link($item->parent_item->name, ['controller' => 'Items', 'action' => 'view', $item->parent_item->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($item->id) ?></p>
            <h6 class="subheader"><?= __('Quantity') ?></h6>
            <p><?= $this->Number->format($item->quantity) ?></p>
            <h6 class="subheader"><?= __('Lft') ?></h6>
            <p><?= $this->Number->format($item->lft) ?></p>
            <h6 class="subheader"><?= __('Rght') ?></h6>
            <p><?= $this->Number->format($item->rght) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($item->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($item->modified) ?></p>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Items') ?></h4>
    <?php if (!empty($item->child_items)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Name') ?></th>
            <th><?= __('Quantity') ?></th>
            <th><?= __('Parent Id') ?></th>
            <th><?= __('Lft') ?></th>
            <th><?= __('Rght') ?></th>
            <th><?= __('Created') ?></th>
            <th><?= __('Modified') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($item->child_items as $childItems): ?>
        <tr>
            <td><?= h($childItems->id) ?></td>
            <td><?= h($childItems->name) ?></td>
            <td><?= h($childItems->quantity) ?></td>
            <td><?= h($childItems->parent_id) ?></td>
            <td><?= h($childItems->lft) ?></td>
            <td><?= h($childItems->rght) ?></td>
            <td><?= h($childItems->created) ?></td>
            <td><?= h($childItems->modified) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $childItems->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $childItems->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $childItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childItems->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
