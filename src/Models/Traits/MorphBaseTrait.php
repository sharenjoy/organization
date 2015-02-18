<?php namespace Sharenjoy\Organization\Models\Traits;

use Sharenjoy\Cmsharenjoy\Utilities\String;

trait MorphBaseTrait {
    
    /**
     * Perform the action of divisioning the model with the given string
     * @param $params string or array
     */
    public function roll($params, $morph)
    {
        $params = $this->makeArray($params);
        $currentSlug = $this->fetchSlugs($morph);

        // do some format for the string
        foreach ($params as $key => $value) $params[$key] = $this->format($value);

        $deletions = array_diff($currentSlug, $params);
        $additions = array_diff($params, $currentSlug);
        
        $upmorph = $this->ucMorph($morph);

        foreach($additions as $param) $this->{'add'.$upmorph}($param);
        foreach($deletions as $param) $this->{'remove'.$upmorph}($param);
    }

    /**
     * Remove the division from this model
     * @param $params string or array (or null to remove all divisions)
     */
    public function un($params = null, $morph)
    {
        $upmorph = $this->ucMorph($morph);

        if (is_null($params))
        {
            $currentSlug = $this->fetchSlugs($morph);

            foreach($currentSlug as $param)
            {
                $this->{'remove'.$upmorph}($param);
            }

            return;
        }

        $params = $this->makeArray($params);
        
        foreach($params as $param)
        {
            $this->{'remove'.$upmorph}($this->format($param));
        }
    }

    /**
     * Add the division from this model
     * @param string|array $param
     */
    public function in($params, $morph)
    {
        $upmorph = $this->ucMorph($morph);

        $params = $this->makeArray($params);
        
        foreach($params as $param)
        {
            $this->{'add'.$upmorph}($this->format($param));
        }
    }
    
    /**
     * Return array of the division names related to the current model
     * @return array
     */
    public function fetchSlugs($morph)
    {
        return $this->$morph()->get()->lists('slug');
    }

    /**
     * To make first character uppercase
     * @param  String $morph
     * @return String
     */
    protected function ucMorph($morph)
    {
        return ucfirst(strtolower($morph));
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
