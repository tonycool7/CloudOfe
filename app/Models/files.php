<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected  $primaryKey = "id";

    protected $table = "file";

    public $fillable = [
        'name',
        'folder_id',
        'type',
        'size',
        'extension'
    ];
}
