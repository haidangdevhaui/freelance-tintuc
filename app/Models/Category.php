<?php

namespace App\Models;

class Category extends AbstractModel
{
	/**
	 * get for menu
	 * @return Array
	 */
	public function getForMenu()
	{
		return $this->select('name', 'slug')
			->get()
			->toArray();
	}

	/**
	 * get all
	 * @return Array
	 */
	public function getALl()
	{
		return $this->select('id', 'parent_id', 'name')->get();
	}
}