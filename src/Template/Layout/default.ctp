<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->assign('title', $title);?>
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css([
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css',
        'common'
    ]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
    <div class="container-fluid">
        <header class="row">
            <h1>Track your Guild Wars 2 Legendary</h1>
            <?= $this->cell('navigation');?>
        </header>

        <div id="content">
            <?= $this->Flash->render() ?>

            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>

        <footer class="row">
        </footer>
    </div>

    <?= $this->Html->script([
        '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'
    ])?>
    <?= $this->fetch('script') ?>
</body>
</html>
