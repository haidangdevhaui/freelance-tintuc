<?php

namespace App\Models;

class Video extends AbstractModel
{
	/**
	 * get video list
	 * @return array
	 */
	public function getList()
	{
		return $this->orderBy('id', 'desc')->paginate(10);
	}

	/**
	 * get top videow
	 * @return array
	 */
	public function getTop()
	{
		return $this->orderBy('id', 'desc')->limit(6)->get()->toArray();
	}
}
