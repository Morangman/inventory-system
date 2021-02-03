<?php

declare(strict_types = 1);

return [
    'title' => 'Inventory items',
    'form' => [
        'dashboard' => 'Dashboard',
        'category' => 'Category',
        'status' => 'Status',
        'placement' => 'Placement',
        'model' => 'Model',
        'price' => 'Price',
        'placement_comment' => 'Placement comment',
        'comment' => 'Comment',
        'p_date' => 'Purchased at',
    ],
    'index' => [
        'table' => [
            'headers' => [
                'category' => 'Category',
                'status' => 'Status',
                'placement' => 'Placement',
                'model' => 'Model',
                'price' => 'Price',
                'placement_comment' => 'Placement comment',
                'comment' => 'Comment',
                'p_date' => 'Purchased at',
                'edit' => 'Edit',
            ],
        ],
    ],
    'create' => [
        'title' => 'Create inventory item',
    ],
    'edit' => [
        'title' => 'Edit inventory item',
    ],
    'messages' => [
        'stored' => 'Inventory saved successfully!',
        'updated' => 'Inventory updated successfully!',
        'deleted' => 'Inventory delete successfully!',
    ],
];
