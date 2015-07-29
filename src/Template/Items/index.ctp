<h2>Choose your Legendary</h2>

<p>The idea of this site is to help visualise the progress of building a legendary.</p>
<p>Tracking the resources required to craft the weapon.</p>

<ul>
    <?php foreach ($legendaries as $item):?>
        <li><?= $this->Html->link($item->name, ['controller' => 'Items', 'action' => 'view', 'slug' => \Cake\Utility\Inflector::slug(strtolower($item->name), '-')]);?></li>
    <?php endforeach; ?>
</ul>