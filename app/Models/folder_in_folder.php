<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class folder_in_folder extends Model
{
    protected $table = "folder_in_folder";

    protected $fillable = [
        'parent_folder_id',
        'child_folder_id'
    ];

    public function folder(){
        return $this->belongsTo(folder::class, 'child_folder_id', 'id');
    }
}
