<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
	protected $table = 'orders';

	

	protected $fillable = [
		'user_id',
		'fname',
		'lname',
		'email',
		'phone',
		'address',
		'city',
		'province',
		'postalcode',
		'total_price',
		'tax',
		'iva',
		'status',
		'order_tacking'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function orderItems()
	{
		return $this->hasMany(OrderItem::class);
	}
}
