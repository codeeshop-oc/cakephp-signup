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

	    <main class="main">
	    <?= $this->Form->create($user, [ 'context' => ['validator' => 'login'], 'class' => 'form-horizontal', 'controller' => 'Signup', 'action' => 'loginCheck', ]); ?>
	    <div class="container register-form">
	        <div class="row">
	        	<div class="col-sm-offset-6 col-sm-6">
			        <div class="form">
			            <div class="note">
			                <h1>Signin</h1>
			            </div>
			            <div class="form-content">
			                <div class="row">	                	
			                    <div class="col-md-12">	                    	
			                        <div class="form-group <?= isset($user->getErrors()['phone_no']) ? 'has-error' : '' ?>">
			                            <input type="text" name="phone_no" class="form-control" placeholder="Phone Number *" value="<?= $user['phone_no'] ?>"/>
			                        </div>
			                    </div>
			                    <div class="col-md-12">
			                        <div class="form-group <?= isset($user->getErrors()['password']) ? 'has-error' : '' ?>">
			                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="<?= $user['password'] ?>"/>
			                        </div>	                        
			                    </div>
			                </div>
			                <?= $this->Form->submit('Login', [ 'class' => 'btnSubmit']); ?>
			            </div>
			        </div>
			    </div>
		    </div>
	    </div>

    </main>

</body>
</html>
