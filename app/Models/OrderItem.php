<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
	protected $table = 'order_items';

	protected $casts = [
		'product_id' => 'int',
		'order_id' => 'int',
		'quantity' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'product_id',
		'order_id',
		'quantity',
		'price'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}
