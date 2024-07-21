<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'mask',
        'profileImg',
        'fullname',
        'membership_no',
        'dob',
        'contact',
        'gender',
        'hometown',
        'mask',
        'region',
        'marital',
        'residence',
        'email',
        'fathersname',
        'fatherstat',
        'mothersname',
        'motherstat',
        'next_of_kin',
        'next_of_kin_contact',
        'relation_to_nok',
        'email_of_nok',
        'dept',
        'baptism_stat',
        'date_baptised',
        'yom',
        'profession',
        'present_occupation',
        'name_of_company',
        'employment_stat',


    ];
}
