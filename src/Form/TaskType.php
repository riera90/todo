<?php

namespace App\Form;

use App\Entity\Task;
use function PHPSTORM_META\type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('desctiption', null, [
                'label'=> 'Descriptión',
            ])
            ->add('isDone', null, [
                'label' => '¿terminado?',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'enviar',
            ])
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Task::class,
        ]);
    }
}
