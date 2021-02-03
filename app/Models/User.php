<?php

declare(strict_types = 1);

namespace App\Models;

use Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'is_admin',
        'is_blocked',
        'locale',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'is_admin' => 'bool',
        'is_blocked' => 'bool',
        'locale' => 'string',
    ];

    /**
     * @param string $pass
     *
     * @return void
     */
    public function setPasswordAttribute(string $pass): void
    {
        $this->attributes['password'] = Hash::make($pass);
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function setIsAdminAttribute($value): void
    {
        $this->attributes['is_admin'] = (bool) $value;
    }

    /**
     * @param mixed $value
     *
     * @return void
     */
    public function setIsBlockedAttribute($value): void
    {
        $this->attributes['is_blocked'] = (bool) $value;
    }
}
