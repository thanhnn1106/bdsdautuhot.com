<?php
define('LIMIT_ROW', 10);
define('LIMIT_FRONT_ROW', 16);
define('LIMIT_ROW_AJAX', 30);
define('ROLE_ADMIN', 'administrator');
define('ROLE_MANAGE', 'manage');
define('DATETIME_FORMAT', 'Y-m-d H:i:s');
define('VERSION', '1.2');
define('DATE_FORMAT', 'Y-m-d');
define('MAX_PREMIUM_FILE_DOWNLOAD', 2);
return [
    'roles' => array(
        'administrator' => 1,
        'manage'        => 2,
    ),
    'user_status' => array(
        'label' => array(
            1 => 'Active',
            0 => 'Inactive',
        ),
        'value' => array(
            'active'   => 1,
            'inactive' => 0
        ),
    ),
    'match_show' => array(
        'label' => array(
            1 => 'Active',
            0 => 'Inactive',
        ),
        'value' => array(
            'active'   => 1,
            'inactive' => 0
        ),
    ),
    'match_status' => array(
        'label' => array(
            0 => 'Start soon',
            1 => 'Playing',
            2 => 'Finished',
            3 => 'Returned result'
        ),
        'value' => array(
            'coming'         => 0,
            'playing'        => 1,
            'match_status'   => 2,
            'updated_result' => 2
        )
    ),
    'group_info' => array(
        1 => 'Group A',
        2 => 'Group B',
        3 => 'Group C',
        4 => 'Group D',
        5 => 'Group E',
        6 => 'Group F',
        7 => 'Group G',
        8 => 'Group H',
    )
];
