<?php

namespace Harryn\Jacobn\MailboxBundle\UIComponents\Dashboard\Panel\Items\Settings;

use Harryn\Jacobn\CoreFrameworkBundle\Dashboard\Segments\PanelSidebarItemInterface;
use Harryn\Jacobn\CoreFrameworkBundle\UIComponents\Dashboard\Panel\Sidebars\Settings;

class Mailboxes implements PanelSidebarItemInterface
{
    public static function getTitle() : string
    {
        return "Mailboxes";
    }

    public static function getRouteName() : string
    {
        return 'helpdesk_member_mailbox_settings';
    }

    public static function getSupportedRoutes() : array
    {
        return [
            'helpdesk_member_mailbox_settings',
            'helpdesk_member_mailbox_create_configuration',
            'helpdesk_member_mailbox_update_configuration',
        ];
    }

    public static function getRoles() : array
    {
        return ['ROLE_ADMIN'];
    }

    public static function getSidebarReferenceId() : string
    {
        return Settings::class;
    }
}
