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
use Cake\Utility\Hash;
use App\Model\Entity\User;

class SignupController extends AppController
{
	public function initialize(): void
    {
        parent::initialize();
        
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['add']);

        $result = $this->Authentication->getResult();
        
        if ($result->isValid()) {            
            return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
        }
    }

    public function add() {

        $this->loadModel('Users');

        if ($this->request->is('post')) {

            $user = $this->Users->newEntity($this->request->getData());

            $usersTable = TableRegistry::getTableLocator()->get('Users');

            if(empty($user->getErrors())) {
                $conditions = array(
                    'Users.phone_no' => $user->phone_no,                
                );
                
                if($usersTable->exists($conditions)) {
                    $this->Flash->error(__('User already exists with current phone number.'));
                } elseif ($this->Users->save($user)) {
                    $this->Flash->success(__('Successfully Registered.'));  
                    return $this->redirect(['controller' => 'Users', 'action' => 'login']);
                }
            } else {
                // foreach ($user->getErrors() as $key => $error) {
                //     foreach ($error as $err) {
                //         $this->Flash->error(__($key . ' : ' . $err));                        
                //         break;
                //     }
                // }     
                $this->Flash->error(__('Please enter all fields correctly'));                        
            }
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
