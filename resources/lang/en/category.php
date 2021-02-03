<?php

declare(strict_types = 1);

return [
    'title' => 'Categories',
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
        'title' => 'Create category',
    ],
    'edit' => [
        'title' => 'Edit category',
    ],
    'messages' => [
        'stored' => 'Category saved successfully!',
        'updated' => 'Category updated successfully!',
        'deleted' => 'Category delete successfully!',
    ],
];
