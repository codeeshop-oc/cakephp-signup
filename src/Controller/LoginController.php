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
use Cake\Auth\DefaultPasswordHasher;

class LoginController extends AppController
{
	public function initialize(): void
    {
        parent::initialize();
        
        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    public function index(): ?Response
    {
        $usersTable = TableRegistry::getTableLocator()->get('User');
        
        $user = $usersTable->newEmptyEntity();

        $this->set('user', $user);

        return $this->render('index');
    }

    public function login()
    {
        $this->loadModel('Login');

        // print_r($this->Auth);
        $users = TableRegistry::getTableLocator()->get('Users');
    
        $user = $this->Login->newEntity($this->request->getData());            
        if ($this->request->is('post')) {               
            
            if(empty($user->getErrors())) {

                $DefaultPasswordHasher = new DefaultPasswordHasher();
                $get = $DefaultPasswordHasher->check($user->password, $DefaultPasswordHasher->hash($user->password));
                print_r($get);die;
                $conditions = array(
                'Users.phone_no' => $user->phone_no,                
                'Users.password' => User::setPasswordhash($user->password),                
                );
                
                $users->exists($conditions) ? $this->Flash->success(__('The user is logged in.')) : $this->Flash->error(__('Please check for correct details'));
            } else {
                foreach ($user->getErrors() as $key => $error) {
                    foreach ($error as $err) {
                        $this->Flash->error(__($key . ' : ' . $err));                        
                        break;
                    }
                } 
            }
        }
        
        $this->set('user', $user);
        
        return $this->render('index');
    }
}
