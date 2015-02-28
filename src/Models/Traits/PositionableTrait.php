<?php namespace Sharenjoy\Organization\Models\Traits;

trait PositionableTrait {

	/**
	 * Return collection of positions related to the positionable model
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function positions()
	{
		return $this->morphToMany($this->getOrganizationConfig('position.model'), 'positionable');
	}
	
	/**
	 * Adds a single position
	 * 
	 * @param $param string
	 */
	private function addPositions($param)
	{
		if (is_null($param) || $param == '') return;

		// return Builder
		$model = $this->getOrganizationConfig('position.model');
		$model = new $model;
        
        $position = $model::where('slug', '=', $param)->first();
		
		if (is_object($position))
		{
			// return collection object
			$positionPivot = $this->positions()->wherePivot('position_id', '=', $position->id)->get();
			
	        if ($positionPivot->count() === 0)
	        {
	        	$this->positions()->attach($position->id);
	        }
		}
		else
		{
			$model->name = $param;
			
			$this->positions()->save($model);	
		}
	}
	
	/**
	 * Removes a single position
	 * 
	 * @param $param string
	 */
	private function removePositions($param)
	{
		if (is_null($param) || $param == '') return;

		$model = $this->getOrganizationConfig('position.model');
		$model = new $model;

        $position = $model::where('slug', '=', $param)->first();

		if (is_object($position))
		{
			// return collection object
			$positionPivot = $this->positions()->wherePivot('position_id', '=', $position->id)->get();
			
	        if ($positionPivot->count()) $this->positions()->detach($position->id);
		}
	}

	/**
	 * Filter model to subset with the given positions
	 * @param $params array|string
	 */
	public function scopeWithAnyPosition($query, $params)
	{
		$params = $this->makeArray($params);

		foreach($params as $key => $param)
			$params[$key] = $this->format($param);
		
		return $query->whereHas('positions', function($q) use($params)
		{
			$q->whereIn('slug', $params);
		});
	}

	/**
	 * Filter model to subset with the given positions
	 * @param $params array|string
	 */
	public function scopeWithAllPositions($query, $params)
	{
		$params = $this->makeArray($params);
		
		foreach($params as $param)
		{
			$param = $this->format($param);

			$query->whereHas('positions', function($q) use($param)
			{
				$q->where('slug', '=', $param);
			});
		}
		
		return $query;
	}

}
