<?php 

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

class User extends Entity
{
    // ...

    // public function _setPassword($password)
    // {    	    	
    //     if (strlen($password) > 0) {
    //       return (new DefaultPasswordHasher)->hash($password);
    //     }
    // }

    public function setPasswordhash($password)
    {    	    	
        if (strlen($password) > 0) {
          return (new DefaultPasswordHasher)->hash($password);
        }
    }

    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    // ...

    protected function _setPassword($password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
    // ...
}
