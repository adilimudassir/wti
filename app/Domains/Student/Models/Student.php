<?php

namespace Domains\Student\Models;

use Domains\Auth\Models\User;

class Student extends User
{
    protected $table = 'users';

    protected $guard_name = 'web';

    /**
     *
     * Get Account types
     */
    public static $types = [
        'REGULAR STUDENT' => 'REGULAR STUDENT',
        'CORPS MEMBER' => 'CORPS MEMBER',
    ];

    public static $states = [
        'Abuja' => 'Abuja',
        'Abia' => 'Abia',
        'Adamawa' => 'Adamawa',
        'Akwa Ibom' => 'Akwa Ibom',
        'Anambra' => 'Anambra',
        'Bauchi' => 'Bauchi',
        'Bayelsa' => 'Bayelsa',
        'Benue' => 'Benue',
        'Borno' => 'Borno',
        'Cross River' => 'Cross River',
        'Delta' => 'Delta',
        'Ebonyi' => 'Ebonyi',
        'Edo' => 'Edo',
        'Ekiti' => 'Ekiti',
        'Enugu' => 'Enugu',
        'Gombe' => 'Gombe',
        'Imo' => 'Imo',
        'Jigawa' => 'Jigawa',
        'Kaduna' => 'Kaduna',
        'Kano' => 'Kano',
        'Katsina' => 'Katsina',
        'Kebbi' => 'Kebbi',
        'Kogi' => 'Kogi',
        'Kwara' => 'Kwara',
        'Lagos' => 'Lagos',
        'Nasarawa' => 'Nasarawa',
        'Niger' => 'Niger',
        'Ogun' => 'Ogun',
        'Ondo' => 'Ondo',
        'Osun' => 'Osun',
        'Oyo' => 'Oyo',
        'Plateau' => 'Plateau',
        'Rivers' => 'Rivers',
        'Sokoto' => 'Sokoto',
        'Taraba' => 'Taraba',
        'Yobe' => 'Yobe',
        'Zamfara' => 'Zamfara',
    ];
}
