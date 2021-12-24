<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string|null $description
 * @property int $category_id
 * @property int $stock
 * @property float|null $rating
 * @property string|null $image
 * @property int|null $is_hot
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Category $category
 * @property Collection|Cart[] $carts
 * @property Collection|OrderItem[] $order_items
 * @property Collection|Wishlist[] $wishlists
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'category_id' => 'int',
		'stock' => 'int',
		'rating' => 'float',
		'is_hot' => 'int'
	];

	protected $fillable = [
		'name',
		'price',
		'description',
		'category_id',
		'stock',
		'rating',
		'image',
		'is_hot'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function carts()
	{
		return $this->hasMany(Cart::class);
	}

	public function order_items()
	{
		return $this->hasMany(OrderItem::class);
	}

	public function wishlists()
	{
		return $this->hasMany(Wishlist::class);
	}
}
