<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles' ;
    protected $primarykey = 'id';
    public $timestamps = false ;
    protected $fillable = [
        'role'
    ];
    /**
         * Get the user that owns the Role
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class, 'role_id', 'id');
        }
}
