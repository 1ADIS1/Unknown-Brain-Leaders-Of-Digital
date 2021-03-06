<?php
/***************************************************************************
 *                                                                          *
 *   (c) 2004 Vladimir V. Kalynyak, Alexey V. Vinokurov, Ilya M. Shalnev    *
 *                                                                          *
 * This  is  commercial  software,  only  users  who have purchased a valid *
 * license  and  accept  to the terms of the  License Agreement can install *
 * and use this program.                                                    *
 *                                                                          *
 ****************************************************************************
 * PLEASE READ THE FULL TEXT  OF THE SOFTWARE  LICENSE   AGREEMENT  IN  THE *
 * "copyright.txt" FILE PROVIDED WITH THIS DISTRIBUTION PACKAGE.            *
 ****************************************************************************/

namespace Tygh\Notifications\Transports\Internal\ReceiverFinders;

use Tygh\Database\Connection;
use Tygh\Enum\ObjectStatuses;
use Tygh\Enum\UserTypes;
use Tygh\Notifications\Transports\Internal\InternalMessageSchema;

/**
 * Class UsergroupIdFinder finds receivers in the specified user group.
 *
 * @package Tygh\Notifications\Transports\Internal\ReceiverFinders
 */
class UsergroupIdFinder implements ReceiverFinderInterface
{
    /**
     * @var \Tygh\Database\Connection
     */
    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * @inheritDoc
     */
    public function find($criterion, InternalMessageSchema $message_schema)
    {
        $conditions = [
            'users.status'            => ObjectStatuses::ACTIVE,
            'usergroups.status'       => ObjectStatuses::ACTIVE,
            'usergroups.usergroup_id' => (int) $criterion,
        ];

        if ($message_schema->to_company_id !== null) {
            $conditions['users.company_id'] = [0, (int) $message_schema->to_company_id];
        }

        return $this->db->getSingleHash(
            'SELECT users.user_id AS user_id, (CASE WHEN users.user_type = ?s THEN ?s ELSE ?s END) AS area'
            . ' FROM ?:users AS users'
            . ' LEFT JOIN ?:usergroup_links AS usergroups ON usergroups.user_id = users.user_id'
            . ' WHERE ?w'
            . ' GROUP BY users.user_id',
            ['user_id', 'area'],
            UserTypes::CUSTOMER,
            UserTypes::CUSTOMER,
            UserTypes::ADMIN,
            $conditions
        );
    }
}
