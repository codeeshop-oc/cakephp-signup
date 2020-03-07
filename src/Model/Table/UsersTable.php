namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
	public function initialize(array $config): void
    {
        $this->setTable('users');
        $this->setPrimaryKey('id');
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('name', 'create')
            ->notEmptyString('title');

        $validator
            ->allowEmptyString('phone_no')

        $validator
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        return $validator;
    }
}