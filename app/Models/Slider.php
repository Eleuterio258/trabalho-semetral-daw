<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Slider
 * 
 * @property int $id
 * @property string $title
 * @property string $message
 * @property string $image_url
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Slider extends Model
{
	protected $table = 'sliders';

	protected $fillable = [
		'title',
		'message',
		'image_url'
	];
}
