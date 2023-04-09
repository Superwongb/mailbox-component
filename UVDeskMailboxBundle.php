<?php

namespace Harryn\Jacobn\MailboxBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\PassConfig;
use Harryn\Jacobn\MailboxBundle\DependencyInjection\UVDeskExtension;
// use Harryn\Jacobn\MailboxBundle\DependencyInjection\Compilers as UVDeskMailboxCompilers;

class UVDeskMailboxBundle extends Bundle
{
    public function getContainerExtension()
    {
        return new UVDeskExtension();
    }

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        // $container->addCompilerPass(new UVDeskAutomationCompilers\WorkflowPass());
        // $container->addCompilerPass(new UVDeskAutomationCompilers\PreparedResponsePass());
    }
}
