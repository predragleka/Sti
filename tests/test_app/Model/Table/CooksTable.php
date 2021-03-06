<?php
namespace Muffin\Sti\TestApp\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class CooksTable extends Table
{
    public function initialize(array $config)
    {
        $this->table('sti_cooks');
        $this->addBehavior('Muffin/Sti.Sti', [
            'typeMap' => [
                'chef' => 'Muffin\Sti\TestApp\Model\Entity\Chef',
                'baker' => 'Muffin\Sti\TestApp\Model\Entity\Baker',
                'assistant_chef' => 'Muffin\Sti\TestApp\Model\Entity\AssistantChef',
            ]
        ]);
        $this->hasMany('Utensils', [
            'className' => UtensilsTable::class,
        ]);
    }

    public function validationBaker(Validator $validator)
    {
        return $validator->notEmpty('name', 'baker');
    }
}
