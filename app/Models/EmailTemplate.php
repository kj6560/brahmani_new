<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    public $table = 'email_templates';
    protected $fillable = ['template_name', 'template_content', 'status'];
}
