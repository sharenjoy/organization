<?php namespace Sharenjoy\Organization\Models\Traits;

trait DivisionableTrait {

	/**
	 * Return collection of divisions related to the divisionable model
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function divisions()
	{
		return $this->morphToMany($this->getOrganizationConfig('division.model'), 'divisionable');
	}
	
	/**
	 * Adds a single division
	 * 
	 * @param $param string
	 */
	private function addDivisions($param)
	{
		if (is_null($param) || $param == '') return;

		// return Builder
		$model = $this->getOrganizationConfig('division.model');
		$model = new $model;
        
        $division = $model::where('slug', '=', $param)->first();
		
		if (is_object($division))
		{
			// return collection object
			$divisionPivot = $this->divisions()->wherePivot('division_id', '=', $division->id)->get();
			
	        if ($divisionPivot->count() === 0)
	        {
	        	$this->divisions()->attach($division->id);
	        }
		}
		else
		{
			$model->name = $param;
			
			$this->divisions()->save($model);	
		}
	}
	
	/**
	 * Removes a single division
	 * 
	 * @param $param string
	 */
	private function removeDivisions($param)
	{
		if (is_null($param) || $param == '') return;

		$model = $this->getOrganizationConfig('division.model');
		$model = new $model;

        $division = $model::where('slug', '=', $param)->first();

		if (is_object($division))
		{
			// return collection object
			$divisionPivot = $this->divisions()->wherePivot('division_id', '=', $division->id)->get();
			
	        if ($divisionPivot->count()) $this->divisions()->detach($division->id);
		}
	}

	/**
	 * Filter model to subset with the given divisions
	 * @param $params array|string
	 */
	public function scopeWithAnyDivision($query, $params)
	{
		$params = $this->makeArray($params);

		foreach($params as $key => $param)
			$params[$key] = $this->format($param);
		
		return $query->whereHas('divisions', function($q) use($params)
		{
			$q->whereIn('slug', $params);
		});
	}

	/**
	 * Filter model to subset with the given divisions
	 * @param $params array|string
	 */
	public function scopeWithAllDivisions($query, $params)
	{
		$params = $this->makeArray($params);
		
		foreach($params as $param)
		{
			$param = $this->format($param);

			$query->whereHas('divisions', function($q) use($param)
			{
				$q->where('slug', '=', $param);
			});
		}
		
		return $query;
	}

}
