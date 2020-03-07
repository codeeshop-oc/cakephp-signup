<?php
declare(strict_types=1);

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
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

class SignupController extends AppController
{
	public function initialize(): void
    {
        parent::initialize();
        
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function add() {

        $this->loadModel('Users');
        
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {			    
            
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'login']);
			}
            $this->Flash->error(__('Unable to add the user.'));
        }

        $this->set('user', $user);
    }

        public function display(): ?Response
    {
        $usersTable = TableRegistry::getTableLocator()->get('User');
        
        $user = $usersTable->newEmptyEntity();

		$this->set('users', $user);

        return $this->render('index');
    }
}
