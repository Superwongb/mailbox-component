<?php

namespace Harryn\Jacobn\MailboxBundle\Package;

use Harryn\Jacobn\PackageManager\Composer\ComposerPackage;
use Harryn\Jacobn\PackageManager\Composer\ComposerPackageExtension;

class Composer extends ComposerPackageExtension
{
    public function loadConfiguration()
    {
        $composerPackage = new ComposerPackage();
        $composerPackage
            ->movePackageConfig('config/packages/uvdesk_mailbox.yaml', 'Templates/config.yaml');
        
        return $composerPackage;
    }
}
