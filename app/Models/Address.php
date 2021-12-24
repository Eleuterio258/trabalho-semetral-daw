<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Address
 * 
 * @property int $id
 * @property string|null $address
 * @property string|null $city
 * @property string|null $province
 * @property string|null $postalcode
 * @property int|null $lat
 * @property int|null $log
 *
 * @package App\Models
 */
class Address extends Model
{
	protected $table = 'address';
	public $timestamps = false;

	protected $casts = [
		'lat' => 'int',
		'log' => 'int'
	];

	protected $fillable = [
		'address',
		'city',
		'province',
		'postalcode',
		'lat',
		'log'
	];
}
