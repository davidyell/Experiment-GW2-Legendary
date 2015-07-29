<h2><?= $legendary->name?></h2>

<div class="tree">
    <ul>
        <li><?= $legendary->name?>
            <?= $this->Hierarchy->tree($children->toArray()) ?>
        </li>
    </ul>
</div>

<div id="chart_div"></div>

<?php $this->append('script');?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["orgchart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Parent');
        data.addColumn('string', 'ToolTip');

        data.addRows([
            [{v: "<?= $legendary->items[0]->id?>", f: "<?= $legendary->quantity?> <?= $legendary->name?>"}, "", "<?= $legendary->name?>"],
            <?php foreach ($flatChildren as $item): ?>
                [{v: "<?= $item->id?>", f: "<?= $item->quantity?> <?= $item->ingredient->name?>"}, "<?= $item->parent_id?>", "<?= $item->ingredient->name?>"],
            <?php endforeach;?>
        ]);

        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
        chart.draw(data, {
            allowHtml: true,
            allowCollapse: true
        });
    }
</script>
<?php $this->end();?>