<h2><?= $legendary->name?></h2>

<div class="tree">
    <ul>
        <li><span class="legendary"><?= $legendary->name?></span>
            <?= $this->Hierarchy->tree($children->toArray()) ?>
        </li>
    </ul>
    <div class="clearfix"><!-- blank --></div>
</div>

