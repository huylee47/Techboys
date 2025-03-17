<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepComment extends Model
{
    //
    use HasFactory;
    protected $table = 'repcomment';
    protected $fillable = ['user_id', 'product_id', 'content', 'rate','file_id','rep_content', 'status_id'];

}
