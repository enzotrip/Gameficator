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

class RecurrentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('startdate',      DatetimeType::class)
                ->add('nbchoice2',      IntegerType::class)
                ->add('timechoice2',        ChoiceType::class, array(
                    'choices' => array(
                        'Heures' => "Heures",
                        'Jours' => "Jour",
                        'Semaines' => "Semaines",
                        'Mois' => "Mois",
                        'Ans' => 'Ans'
                    )))
                ->add('nbchoice3',      IntegerType::class)
                ->add('timechoice3',        ChoiceType::class, array(
                    'choices' => array(
                        'Heures' => "Heures",
                        'Jours' => "Jour",
                        'Semaines' => "Semaines",
                        'Mois' => "Mois",
                        'Ans' => 'Ans'
                    )))
                ->add('days')        
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
