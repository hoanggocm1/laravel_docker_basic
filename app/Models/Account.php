<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'account_name',
        'account_address',
        'account_phone',
        'account_birth',
    ];
    public function age()
    {
        // $day = Carbon::now('Asia/Ho_Chi_Minh');
        // return ($day - Account::select('account_birth')->get());
    }
}
