<?php

declare(strict_types = 1);

return [
    'title' => 'Users',
    'form' => [
        'dashboard' => 'Dashboard',
        'first_name' => 'First name',
        'last_name' => 'Last name',
        'email' => 'Email',
        'password' => 'Password',
        'is_admin' => 'Is admin',
        'is_blocked' => 'Block',
    ],
    'index' => [
        'table'   => [
            'headers' => [
                'first_name' => 'First name',
                'last_name' => 'Last name',
                'email' => 'Email',
                'is_admin' => 'Is admin',
                'is_blocked' => 'Block',
                'edit' => 'Edit',
            ],
        ],
    ],
    'create' => [
        'title' => 'Create user',
    ],
    'edit' => [
        'title' => 'Edit user',
    ],
    'messages' => [
        'stored' => 'User saved successfully!',
        'updated' => 'User updated successfully!',
        'deleted' => 'User delete successfully!',
    ],
];
