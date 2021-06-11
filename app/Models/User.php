<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */

class User extends Authenticatable
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="Name",
     *     format="int64",
     *     example="Kians"
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     title="email",
     *     description="email",
     *     format="int64",
     *     example="mail.kiansaziz@gmail.com"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *     title="status",
     *     description="status",
     *     format="int64",
     *     example="active"
     * )
     *
     * @var string
     */
    private $status;

    /**
     * @OA\Property(
     *     title="position",
     *     description="position",
     *     format="int64",
     *     example="manager"
     * )
     *
     * @var string
     */
    private $position;

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'position'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
