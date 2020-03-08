<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>

   <?= $this->Html->css('custom.css') ?>

   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <title><?= $this->fetch('title') ?></title>
</head>
<body>
    <?= $this->Flash->render() ?>

    <?= $this->Html->link("Logout", ['action' => 'logout']) ?>

</body>
</html>