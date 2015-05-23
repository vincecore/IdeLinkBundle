<?php

namespace Vincecore\IdeLinkBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Vincecore\IdeLinkBundle\DependencyInjection\Compiler\OverrideCodeExtensionCompilerPass;

class VincecoreIdeLinkBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new OverrideCodeExtensionCompilerPass());
    }
}
