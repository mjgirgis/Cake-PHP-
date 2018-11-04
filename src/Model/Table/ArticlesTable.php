<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;
function beforeSave($event, $entity, $options)
{
    if ($entity->isNew() && !$entity->slug) {
        $sluggedTitle = Text::slug($entity->title);
        $entity->slug = substr($sluggedTitle, 0, 191);
    }
}

function validationDefault(Validator $validator)
{
    $validator
        ->notEmpty('title')
        ->minLength('title', 10)
        ->maxLength('title', 255)

        ->notEmpty('body')
        ->minLength('body', 10);

    return $validator;
}
?>
