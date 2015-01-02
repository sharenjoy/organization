<?php namespace Sharenjoy\Organization\Models\Traits;

use Sharenjoy\Cmsharenjoy\Utilities\String;

trait RoleableTrait {

	/**
	 * Return collection of roles related to the roleable model
	 * @return Illuminate\Database\Eloquent\Collection
	 */
	public function roles()
	{
		return $this->morphToMany($this->getOrganizationConfig('role.model'), 'roleable');
	}
	
	/**
	 * Perform the action of roleing the model with the given string
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
		
		foreach($additions as $param) $this->addRole($param);
		foreach($deletions as $param) $this->removeRole($param);
	}

	/**
	 * Remove the role from this model
	 * @param $params string or array (or null to remove all roles)
	 */
	public function un($params = null)
	{
		if (is_null($params))
		{
			$currentSlug = $this->fetchSlugs();

			foreach($currentSlug as $param)
			{
				$this->removeRole($param);
			}

			return;
		}

		$params = $this->makeArray($params);
		
		foreach($params as $param)
		{
			$this->removeRole($this->format($param));
		}
	}

	/**
	 * Add the role from this model
	 * @param string|array $param
	 */
	public function in($params)
	{
		$params = $this->makeArray($params);
		
		foreach($params as $param)
		{
			$this->addRole($this->format($param));
		}
	}
	
	/**
	 * Return array of the role names related to the current model
	 * @return array
	 */
	public function fetchSlugs()
	{
		return $this->roles()->get()->lists('slug');
	}
	
	/**
	 * Adds a single role
	 * 
	 * @param $param string
	 */
	private function addRole($param)
	{
		if (is_null($param) || $param == '') return;

		// return Builder
		$model = $this->getOrganizationConfig('role.model');
		$model = new $model;
        
        $role = $model::where('slug', '=', $param)->first();
		
		if (is_object($role))
		{
			// return collection object
			$rolePivot = $this->roles()->wherePivot('role_id', '=', $role->id)->get();
			
	        if ($rolePivot->count() === 0)
	        {
	        	$this->roles()->attach($role->id);
	        }
		}
		else
		{
			$model->name = $param;
			
			$this->roles()->save($model);	
		}
	}
	
	/**
	 * Removes a single role
	 * 
	 * @param $param string
	 */
	private function removeRole($param)
	{
		if (is_null($param) || $param == '') return;

		$model = $this->getOrganizationConfig('role.model');
		$model = new $model;

        $role = $model::where('slug', '=', $param)->first();

		if (is_object($role))
		{
			// return collection object
			$rolePivot = $this->roles()->wherePivot('role_id', '=', $role->id)->get();
			
	        if ($rolePivot->count()) $this->roles()->detach($role->id);
		}
	}

	/**
	 * Filter model to subset with the given roles
	 * @param $params array|string
	 */
	public function scopeWithAnyRole($query, $params)
	{
		$params = $this->makeArray($params);

		foreach($params as $key => $param)
			$params[$key] = $this->format($param);
		
		return $query->whereHas('roles', function($q) use($params)
		{
			$q->whereIn('slug', $params);
		});
	}

	/**
	 * Filter model to subset with the given roles
	 * @param $params array|string
	 */
	public function scopeWithAllRoles($query, $params)
	{
		$params = $this->makeArray($params);
		
		foreach($params as $param)
		{
			$param = $this->format($param);

			$query->whereHas('roles', function($q) use($param)
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
