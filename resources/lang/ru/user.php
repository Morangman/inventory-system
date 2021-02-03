<?php

declare(strict_types = 1);

return [
    'title' => 'Пользователи',
    'form' => [
        'dashboard' => 'Главная',
        'first_name' => 'Имя',
        'last_name' => 'Фамилия',
        'email' => 'E-Mail адрес',
        'password' => 'Пароль',
        'is_admin' => 'Администратор',
        'is_blocked' => 'Заблокирован',
    ],
    'index' => [
        'table'   => [
            'headers' => [
                'first_name' => 'Имя',
                'last_name' => 'Фамилия',
                'email' => 'E-Mail адрес',
                'is_admin' => 'Администратор',
                'is_blocked' => 'Заблокирован',
                'edit' => 'Редактировать',
            ],
        ],
    ],
    'create' => [
        'title' => 'Создать пользователя',
    ],
    'edit' => [
        'title' => 'Редакиторвать пользователя',
    ],
    'messages' => [
        'stored' => 'Пользователь успешно сохранен!',
        'updated' => 'Пользователь успешно обновлен!',
        'deleted' => 'Пользователь успешно удален!',
    ],
];
