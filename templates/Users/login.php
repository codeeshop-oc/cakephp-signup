<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
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
    
    <div>
        <p class="text-right">
            <?= $this->Html->link("Signup", [ 'controller' => 'Signup', 'action' => 'add'], ['class' => 'btn btn-lg btn-primary margintop5']) ?>
        </p>
    </div>

    <?= $this->Form->create() ?>
    <main class="main">
        <div class="container users form">
            <div class="row">
                <div class="col-sm-offset-6 col-sm-6">
                    <div class="form">
                        <div class="note">
                            <h1 class="lhunset">Signin</h1>
                        </div>
                        <div class="form-content">
                            <div class="row">                       
                                <div class="col-md-12">                         
                                    <?= $this->Form->control('phone_no', ['required' => true]) ?>
                                </div>
                                <div class="col-md-12">
                                    <?= $this->Form->control('password', ['required' => true]) ?>
                                </div>
                            </div>
                            <?= $this->Form->submit(__('Login')); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <?= $this->Form->end() ?>
</body>
</html>
