<?php

declare(strict_types = 1);

return [
    'title' => 'Statuses',
    'form' => [
        'dashboard' => 'Dashboard',
        'name' => 'Name',
    ],
    'index' => [
        'table'   => [
            'headers' => [
                'name' => 'Name',
                'edit' => 'Edit',
            ],
        ],
    ],
    'create' => [
        'title' => 'Create status',
    ],
    'edit' => [
        'title' => 'Edit status',
    ],
    'messages' => [
        'stored' => 'Status saved successfully!',
        'updated' => 'Status updated successfully!',
        'deleted' => 'Status delete successfully!',
    ],
];
