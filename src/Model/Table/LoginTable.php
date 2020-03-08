<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\Validation\Validator;  
use Cake\ORM\TableRegistry;

class LoginTable extends Table
{
	public function initialize(array $config): void
    {
        $this->setTable('users');        
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator) : Validator
    {
        
        $validator
            ->requirePresence('phone_no')
            ->notEmptyString('phone_no')
            ->add('phone_no',  'custom', [
                'rule' => function ($value, $context) {
                    if(strlen($value) == 10) {
                        return true;
                    }
                },
                'message' => 'Phone Number need to be at least 10 characters long'
            ]);

        $validator
            ->requirePresence('password')            
            ->add('password', [
                'length' => [
                    'rule' => ['minLength', 4],
                    'message' => 'Password need to be at least 4 characters long',
                ]
            ]);
    
        return $validator;       
    }
}   