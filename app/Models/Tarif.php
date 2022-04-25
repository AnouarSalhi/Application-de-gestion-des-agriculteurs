<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $primaryKey = 'tar_description';
    protected $keyType = 'string';

    protected $fillable=[
        'tar_description',
        'tar_ero',
    ];

    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
