<?php

namespace GR\GameficatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RecurrentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('startdate',        DateType::class, array(
                      'widget' => 'single_text',
                      'format' => 'dd/MM/yyyy', 'required' =>false
                 ))
                ->add('enddate',        DateType::class, array(
                      'widget' => 'single_text',
                      'format' => 'dd/MM/yyyy', 'required' =>false
                 ))
                ->add('nbchoice2',      IntegerType::class,array( 'required' =>false))
                ->add('timechoice2',        ChoiceType::class, array(
                    'choices' => array(
                        'Heures' => "Heures",
                        'Jours' => "Jours",
                        'Semaines' => "Semaines",
                        'Mois' => "Mois",
                        'Ans' => 'Ans'
                    ), 'required' =>false))
                ->add('nbchoice3',      IntegerType::class,array( 'required' =>false))
                ->add('timechoice3',        ChoiceType::class, array(
                    'choices' => array(
                        'Heures' => "Heures",
                        'Jours' => "Jours",
                        'Semaines' => "Semaines",
                        'Mois' => "Mois",
                        'Ans' => 'Ans'
                    ), 'required' =>false))
                ->add('days',      EntityType::class, array(
                    'class'        => 'GRGameficatorBundle:Day',
                    'choice_label' => 'name',
                    'multiple'     => true,
                    'expanded'     => true, 'required' =>false))      
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GR\GameficatorBundle\Entity\Recurrent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gr_gameficatorbundle_recurrent';
    }


}
