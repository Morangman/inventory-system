<?php

declare(strict_types = 1);

return [
    'title' => 'Статусы',
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
        'title' => 'Создать статус',
    ],
    'edit' => [
        'title' => 'Редактировать статутс',
    ],
    'messages' => [
        'stored' => 'Статус успешно сохранен!',
        'updated' => 'Статус успешно обновлен!',
        'deleted' => 'Статус успешно удален!',
    ],
];
