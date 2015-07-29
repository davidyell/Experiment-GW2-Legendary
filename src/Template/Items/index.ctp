<h2>Choose your Legendary</h2>

<ul>
    <?php foreach ($legendaries as $item):?>
        <li><?= $this->Html->link($item->name, ['controller' => 'Items', 'action' => 'view', 'slug' => \Cake\Utility\Inflector::slug(strtolower($item->name), '-')]);?></li>
    <?php endforeach; ?>
</ul>