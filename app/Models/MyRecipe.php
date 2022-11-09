<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyRecipe extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'myrecept';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];


    use HasFactory;
}
