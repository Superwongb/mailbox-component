<?php

namespace Harryn\Jacobn\MailboxBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class UVDeskExtension extends Extension
{
    public function getAlias()
    {
        return 'uvdesk_mailbox';
    }

    public function getConfiguration(array $configs, ContainerBuilder $container)
    {
        return new Configuration();
    }

    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yaml');

        // Load bundle configurations
        $configuration = $this->getConfiguration($configs, $container);
        foreach ($this->processConfiguration($configuration, $configs) as $param => $value) {
            switch ($param) {
                case 'emails':
                    foreach ($value as $field => $fieldValue) {
                        $container->setParameter("jacobn.emails.$field", $fieldValue);
                    }
                    break;
                case 'mailboxes':
                    $container->setParameter("jacobn.mailboxes", array_keys($value));

                    foreach ($value as $mailboxId => $mailboxDetails) {
                        $mailboxDetails['email'] = $mailboxDetails['imap_server']['username'];
                        
                        $container->setParameter("jacobn.mailboxes.$mailboxId", $mailboxDetails);
                    }
                    break;
                default:
                    break;
            }
        }
    }
}
