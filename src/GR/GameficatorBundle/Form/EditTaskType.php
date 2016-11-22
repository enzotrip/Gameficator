<?php

namespace GR\GameficatorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class EditTaskType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
  }

  public function getParent()
  {
    return TaskType::class;
  }
}
