<h2><?= $legendary->name?> <?= $legendary->type?></h2>

<div class="progress global">
    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;" data-total="<?= $totalItems->toArray()[0]->sum?>">
        0%
    </div>
</div>

<div class="tree">
    <ul>
        <li><span class="legendary"><?= $legendary->name?></span>
            <?= $this->Hierarchy->tree($children->toArray()) ?>
        </li>
    </ul>
    <div class="clearfix"><!-- blank --></div>
</div>

<div class="shopping-list">
    <h3>Required items</h3>
    <ul id="required">

    </ul>
</div>
