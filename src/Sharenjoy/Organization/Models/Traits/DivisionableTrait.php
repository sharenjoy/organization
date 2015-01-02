<?php namespace Sharenjoy\Organization\Models\Traits;

use Sharenjoy\Cmsharenjoy\Utilities\String;

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
	 * Perform the action of divisioning the model with the given string
	 * @param $params string or array
	 */
	public function roll($params)
	{
		$params = $this->makeArray($params);
		$currentSlug = $this->fetchSlugs();

		// do some format for the string
		foreach ($params as $key => $value) $params[$key] = $this->format($value);

		$deletions = array_diff($currentSlug, $params);
		$additions = array_diff($params, $currentSlug);
		
		foreach($additions as $param) $this->addDivision($param);
		foreach($deletions as $param) $this->removeDivision($param);
	}

	/**
	 * Remove the division from this model
	 * @param $params string or array (or null to remove all divisions)
	 */
	public function un($params = null)
	{
		if (is_null($params))
		{
			$currentSlug = $this->fetchSlugs();

			foreach($currentSlug as $param)
			{
				$this->removeDivision($param);
			}

			return;
		}

		$params = $this->makeArray($params);
		
		foreach($params as $param)
		{
			$this->removeDivision($this->format($param));
		}
	}

	/**
	 * Add the division from this model
	 * @param string|array $param
	 */
	public function in($params)
	{
		$params = $this->makeArray($params);
		
		foreach($params as $param)
		{
			$this->addDivision($this->format($param));
		}
	}
	
	/**
	 * Return array of the division names related to the current model
	 * @return array
	 */
	public function fetchSlugs()
	{
		return $this->divisions()->get()->lists('slug');
	}
	
	/**
	 * Adds a single division
	 * 
	 * @param $param string
	 */
	private function addDivision($param)
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
	private function removeDivision($param)
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

	/**
	 * To format a string
	 * @param  string $param
	 * @return String
	 */
	protected function format($param)
	{
		return String::slug(trim($param));
	}

	/**
	 * Converts input into array
	 * @param $param string or array
	 * @return array
	 */
	protected function makeArray($params)
	{
		if (is_string($params))
		{
			$params = explode(',', $params);
		}
		elseif ( ! is_array($params))
		{
			$params = array(null);
		}
		
		$params = array_map('trim', $params);

		return $params;
	}

}
