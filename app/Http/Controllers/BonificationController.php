<?php
/**
 * Created by PhpStorm.
 * User: victor.oliveira
 * Date: 17/01/2018
 * Time: 08:42
 */

namespace App\Http\Controllers;


use App\Models\Bonification;

class BonificationController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$bonifications = Bonification::orderBy('updated_at', 'desc')->paginate(6);
		return view('admin.bonifications.index', compact('bonifications'));
	}
}