<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatApp extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = ['from_user','to_user','outgoing_msg_id','incoming_msg_id', 'msg','created_at'.'updated_at'];
}

