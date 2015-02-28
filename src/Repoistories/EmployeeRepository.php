<?php namespace Sharenjoy\Organization\Repositories;

use Sharenjoy\Cmsharenjoy\Service\Validation\ValidableInterface;
use Sharenjoy\Organization\Contracts\EmployeeInterface;

class EmployeeRepository extends OrganizationRepository implements EmployeeInterface {

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
            $builder = $builder->whereHas('company', function($query) use ($data)
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
            $builder = $builder->whereHas('department', function($query) use ($data)
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

        if (isset($data['position']))
        {
            $builder = $builder->whereHas('positions', function($query) use ($data)
            {
                foreach ($data['position'] as $key => $value)
                {
                    if ($key == 0)
                        $query->where('slug', $value);
                    else
                        $query->orWhere('slug', $value);
                }
            });
        }

        if (isset($data['division']))
        {
            $builder = $builder->whereHas('divisions', function($query) use ($data)
            {
                foreach ($data['division'] as $key => $value)
                {
                    if ($key == 0)
                        $query->where('slug', $value);
                    else
                        $query->orWhere('slug', $value);
                }
            });
        }

        if (isset($data['role']))
        {
            $builder = $builder->whereHas('roles', function($query) use ($data)
            {
                foreach ($data['role'] as $key => $value)
                {
                    if ($key == 0)
                        $query->where('slug', $value);
                    else
                        $query->orWhere('slug', $value);
                }
            });
        }

        return $builder->orderBy('joined_at')->lists('name', 'id');
    }

}