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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
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
      ->add('priority',        ChoiceType::class, array(
                    'choices' => array(
                        '0' => 0,
                        '1' => 1,
                        '2' => 2,
                        '3' => 3
                    )))
      ->add('project',     EntityType::class, array(
        'class' => 'GRGameficatorBundle:Project',
        'choice_label' => 'name',
        'multiple'     => false,
      ))
      ->add('type',             ChoiceType::class, array(
        'choices' => array(
        'Echéance' => 0,
        'Récurrent' => 1),
        'expanded' => true,
        'multiple' => false))
      ->add('deadline',        DateType::class, array(
        'widget' => 'single_text',
        'format' => 'dd/MM/yyyy'
      ))
      ->add('color',           TextType::class)
      ->add('description',    TextareaType::class)
      ->add('points',         IntegerType::class)
      ->add('save',           SubmitType::class, array('label' => 'Créer'))
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
