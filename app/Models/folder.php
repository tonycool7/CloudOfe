<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class folder extends Model
{
    protected  $primaryKey = "id";

    protected $table = "folder";

    public $fillable = [
        'name',
        'user_id',
        'type'
    ];

    public function files(){
        $this->hasMany(files::class);
    }
}
