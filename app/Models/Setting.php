<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string $about_title
 * @property string $about_detail
 * @property string $about_img
 * @property string $fb_link
 * @property string $ins_link
 * @property string $contact_info
 * @property int $tax
 * @property int $opening_hours
 * @property int|null $iva
 *
 * @package App\Models
 */
class Setting extends Model
{
	protected $table = 'settings';
	public $timestamps = false;

	protected $casts = [
		'tax' => 'int',
		'opening_hours' => 'int',
		'iva' => 'int'
	];

	protected $fillable = [
		'about_title',
		'about_detail',
		'about_img',
		'fb_link',
		'ins_link',
		'contact_info',
		'tax',
		'opening_hours',
		'iva'
	];
}
