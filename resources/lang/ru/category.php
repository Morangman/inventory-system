<?php

declare(strict_types = 1);

return [
    'title' => 'Категории',
    'form' => [
        'dashboard' => 'Главная',
        'name' => 'Название',
    ],
    'index' => [
        'table'   => [
            'headers' => [
                'name' => 'Название',
                'edit' => 'Редактировать',
            ],
        ],
    ],
    'create' => [
        'title' => 'Создать категорию',
    ],
    'edit' => [
        'title' => 'Редактировать категорию',
    ],
    'messages' => [
        'stored' => 'Категория успешно сохранена!',
        'updated' => 'Категория успешно обновлена!',
        'deleted' => 'Категория успешно удалена!',
    ],
];
