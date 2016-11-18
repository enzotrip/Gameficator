<?php

namespace GR\GameficatorBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DatetimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TaskType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {

    $builder
      ->add('name',           TextType::class)
      ->add('priority',       IntegerType::class)
      ->add('description',    TextareaType::class)
      ->add('points',         IntegerType::class)
      ->add('save',           SubmitType::class)
    ;

    $builder->addEventListener(

      FormEvents::PRE_SET_DATA,

      function(FormEvent $event) {

        $task = $event->getData();

        if (null === $task) {
          return;
        }
      }
    );
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'GR\GameficatorBundle\Entity\Task'
    ));
  }
}
