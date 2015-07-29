<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['common']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
    <header>
        <h1>Track your Guild Wars 2 Legendary</h1>
        <nav>
            <ul>
                <li><?= $this->Html->link('Pick your legendary', '/');?></li>
            </ul>
        </nav>
    </header>
    <div id="container">
        <div id="content">
            <?= $this->Flash->render() ?>

            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <?= $this->fetch('script') ?>
</body>
</html>
