<?php

namespace GR\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GRUserBundle extends Bundle
{
  public function getParent()
    {
        return 'FOSUserBundle';
    }
}
