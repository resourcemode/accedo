<?php
/**
 * Model Trait
 *
 * @author  Michael <resourcemode@yahoo.com>
 */
namespace App\Repositories;

/**
 * Class ModelTrait
 *
 * @package App\Repositories
 */
trait ModelTrait
{

    protected $model;

    /**
     * Get instance of model
     *
     * @return mixed
     */
    public function getModel()
    {
        return new $this->model;
    }

    /**
     * Get class name
     *
     * @return mixed
     */
    public function getModelClass()
    {
        return $this->model;
    }

    /**
     * Set current model
     *
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = get_class($model);
    }

    /**
     * Common method, create with fields
     *
     * @param array $fields
     * @return mixed
     */
    public function create(array $fields = [])
    {
        $model = $this->getModel();
        $model->fill($fields);
        $model->save();

        return $model;
    }

    /**
     * Common method, update by id with fields
     *
     * @param $id
     * @param array $fields
     * @return $this
     */
    public function update($id, array $fields = [])
    {
        $this->getModel()->where('id', $id)->update($fields);

        return $this;
    }

}