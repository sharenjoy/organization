<?php namespace Sharenjoy\Organization\Repositories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\DivisionInterface;

class DivisionRepository extends OrganizationRepository implements DivisionInterface {

    public function __construct($model, ValidableInterface $validator)
    {
        $this->validator = $validator;
        $this->model     = $model;
    }

    /**
     * To show the lists data from the above relationship
     * $data variable format is the same of following
     * [
     *     'company'    => ['0'=>'saya', '1'=>'bizin'],
     *     'department' => ['0'=>'ae', '1'=>'am', '2'=>'mm', '3'=>'gap'],
     *     'division'   => ['0'=>'aeone', '1'=>'amone'],
     * ]
     * @param  array $data
     * @return array The data of lists
     */
    public function showAboveRelationshipLists($data)
    {
        $builder = $this->model->query();

        if (isset($data['company']))
        {
            $builder = $builder->whereHas('companies', function($query) use ($data)
            {
                foreach ($data['company'] as $key => $value)
                {
                    if ($key == 0)
                        $query->where('slug', $value);
                    else
                        $query->orWhere('slug', $value);
                }
            });
        }

        if (isset($data['department']))
        {
            $builder = $builder->whereHas('departments', function($query) use ($data)
            {
                foreach ($data['department'] as $key => $value)
                {
                    if ($key == 0)
                        $query->where('slug', $value);
                    else
                        $query->orWhere('slug', $value);
                }
            });
        }

        return $builder->orderBy('sort')->lists('name', 'slug');
    }

}