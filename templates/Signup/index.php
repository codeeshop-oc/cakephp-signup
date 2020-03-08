<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">

    <?= $this->Html->css('custom.css') ?>

   <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <main class="main">
	    <?= $this->Form->create($users, [ 'controller' => 'Signup', 'action' => 'signup/add']); ?>
	    <div class="container register-form">
	        <div class="form">
	            <div class="note">
	                <h1 class="lhunset">Signup</h1>
	            </div>
	            <div class="form-content">
	                <div class="row">	                	
	                    <div class="col-md-6">
	                        <div class="form-group">	                        	
	                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value=""/>
	                        </div>
	                        <div class="form-group">
	                            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number *" value=""/>
	                        </div>
	                    </div>
	                    <div class="col-md-6">
	                        <div class="form-group">
	                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value=""/>
	                        </div>
	                        <div class="form-group">
	                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password *" value=""/>
	                        </div>
	                    </div>
	                </div>
	                <?= $this->Form->submit('Register', [ 'class' => 'btnSubmit']); ?>
	            </div>
	        </div>
	    </div>

    </main>
</body>
</html>
