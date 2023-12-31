<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'amount', 'user_id'];

    // Define the relationship with user 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
