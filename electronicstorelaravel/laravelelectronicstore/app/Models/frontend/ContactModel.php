<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'id';

    // Allow mass assignment on these attributes
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];
}
