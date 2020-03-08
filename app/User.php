<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'loginID',
        'password',
        'contract_type',
        'bank',
        'bank_branch',
        'bank_type',
        'bank_number',
        'tel',
        'lineID',
        'msby_mail',
        'original_mail',
        'address',
        'resident_card',
        'emergency_name',
        'relationship',
        'emergency',
        'emergency_address',
        'birthday',
        'hire',
        'legal_hire',
        'employee_number',
        'virus_soft',
        'licence',
        'leaving'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
