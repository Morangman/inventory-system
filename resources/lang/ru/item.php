<?php

declare(strict_types = 1);

return [
    'title' => 'Инвентарь',
    'form' => [
        'dashboard' => 'Главная',
        'category' => 'Категория',
        'status' => 'Статус',
        'placement' => 'Размещение',
        'model' => 'Модель',
        'price' => 'Стоимость',
        'placement_comment' => 'Комментарий к размещению',
        'comment' => 'Комментарий',
        'p_date' => 'Дата покупки',
    ],
    'index' => [
        'table' => [
            'headers' => [
                'category' => 'Категория',
                'status' => 'Статус',
                'placement' => 'Размещение',
                'model' => 'Модель',
                'price' => 'Стоимость',
                'placement_comment' => 'Комментарий к размещению',
                'comment' => 'Комментарий',
                'p_date' => 'Дата покупки',
                'edit' => 'Редактировать',
            ],
        ],
    ],
    'create' => [
        'title' => 'Создать инвентарь',
    ],
    'edit' => [
        'title' => 'Редактировать инвентарь',
    ],
    'messages' => [
        'stored' => 'Инвентарь успешно сохранен!',
        'updated' => 'Инвентарь успешно обновлен!',
        'deleted' => 'Инвентарь успешно удален!',
    ],
];
