<?php

namespace GR\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditProfileType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('profile_picture',     ProfilePictureType::class)
    ;
  }

  public function getParent()
  {
    return 'FOS\UserBundle\Form\Type\ProfileFormType';
  }
}
