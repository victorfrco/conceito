<?php
/**
 * Created by PhpStorm.
 * User: victor.oliveira
 * Date: 16/01/2018
 * Time: 20:24
 */

namespace App\Models;


class Bonification extends Model{
	protected $table = 'bonifications';
	protected $fillable = ['order_id', 'client_id', 'item_id', 'user_id'];
}