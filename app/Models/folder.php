<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
        return $this->hasMany(files::class);
    }

    public function folders(){
        return $this->hasMany(folder_in_folder::class, 'parent_folder_id');
    }
}

