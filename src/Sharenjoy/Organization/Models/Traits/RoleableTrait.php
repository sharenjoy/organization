<?php namespace Sharenjoy\Organization\Models\Traits;

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

}
