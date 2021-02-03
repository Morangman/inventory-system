<?php

declare(strict_types = 1);

return [
    'title' => 'History',
    'index' => [
        'table' => [
            'headers' => [
                'item_id' => 'Item ID',
                'field_name' => 'Field name',
                'old_value' => 'Old value',
                'new_value' => 'New value',
                'created_at' => 'Created at',
            ],
        ],
    ],
    'clear' => [
        'title' => 'Clear history',
    ],
    'messages' => [
        'cleaning' => 'History successfully cleared!',
    ],
];
