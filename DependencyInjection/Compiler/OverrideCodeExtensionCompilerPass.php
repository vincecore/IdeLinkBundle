<?php

namespace Vincecore\IdeLinkBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OverrideCodeExtensionCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('twig.extension.code');
        $definition->setClass('Vincecore\IdeLinkBundle\Twig\Extension\CodeExtension');
        $definition->setArguments(
            array(
                'fileLink' => $container->getParameter('templating.helper.code.file_link_format'),
                'rootDir' => $container->getParameter('kernel.root_dir'),
                'charset' => $container->getParameter('kernel.charset'),
                'wrongPath' => $container->getParameter('ide_link.wrong_path'),
                'correctPath' => $container->getParameter('ide_link.correct_path'),
            )
        );
    }
}
