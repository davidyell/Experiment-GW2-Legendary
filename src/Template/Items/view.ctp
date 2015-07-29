<h1><?= $item->name?></h1>

<div class="tree">
    <ul>
        <li><a href="#"><?= $item->name?></a>
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
            [{v: "<?= $item->id?>", f: "<?= $item->quantity?> <?= $item->name?>"}, "", "<?= $item->name?>"],
            <?php foreach ($flatChildren as $item): ?>
                [{v: "<?= $item->id?>", f: "<?= $item->quantity?> <?= $item->name?>"}, "<?= $item->parent_id?>", "<?= $item->name?>"],
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