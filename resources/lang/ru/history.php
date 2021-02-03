<?php

declare(strict_types = 1);

return [
    'title' => 'История',
    'index' => [
        'table' => [
            'headers' => [
                'item_id' => 'ID элемента',
                'field_name' => 'Название поля',
                'old_value' => 'Старое значение',
                'new_value' => 'Новое значение',
                'created_at' => 'Создано',
            ],
        ],
    ],
    'clear' => [
        'title' => 'Очистить историю',
    ],
    'messages' => [
        'cleaning' => 'История успешно очищена!',
    ],
];
