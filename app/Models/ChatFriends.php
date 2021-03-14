<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatFriends extends Model
{
	protected $fillable = [
		'sender_id', 
		'receiver_id',
		'receiver_name',
		'sender_name',
		'receiver_image',
		'sender_image',
	];
    protected $table = "chat_friends";

    public function senderInfo()
    {
        return $this->belongsTo('App\User', 'sender_id');
    }
    public function receiverInfo()
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }
}
