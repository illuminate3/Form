<?php

namespace Illuminate3\Form\Element;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Query\Builder;
use Illuminate\Container\Container;
use Closure;

abstract class ModelElement extends AbstractElement implements Type\Choice
{
    protected $qb;
    protected $container;
    protected $model;
	protected $key = 'id';
	protected $field = 'title';
	protected $before;
	protected $after;
	protected $choices = array();
	protected $alias;
    
    /**
	 * @param string $field
	 * @return $this
	 */
	public function field($field)
	{
		$this->field = $field;
		return $this;
	}

	/**
	 * @param string $key
	 * @return $this
	 */
	public function key($key)
	{
		$this->key = $key;
		return $this;
	}

	/**
	 * @param string|Eloquent $model
	 * @return $this
	 */
	public function model($model)
	{
		$this->model = $model;
		return $this;
	}

	/**
	 * @param Builder $model
	 * @return $this
	 */
	public function query(Builder $qb)
	{
		$this->qb = $qb;
		return $this;
	}

	/**
	 * @param string $alias
	 * @return $this
	 */
	public function alias($alias)
	{
		$this->alias = $alias;
		return $this;
	}

	/**
	 * @param array $choices
	 * @return $this
	 */
	public function choices(Array $choices)
	{
		$this->choices = $choices;
		return $this;
	}

	/**
	 * @param callable $before
	 * @return $this
	 */
	public function before(Closure $before)
	{
		$this->before = $before;
		return $this;
	}


	/**
	 * @param callable $after
	 * @return $this
	 */
	public function after(Closure $after)
	{
		$this->after = $after;
		return $this;
	}
    
    /**
     * 
     * @param Container $container
     * @return $this
     */
    public function container(Container $container)
    {
        $this->container = $container;
        return $this;
    }

    /**
	 * @return array
	 */
	public function getChoices()
	{
		if($this->choices) {
			return $this->choices;
		}

        $qb = $this->getQuery();

        if(!$qb) {
            return array();
        }
        
        $this->handleBefore($qb);

		$this->choices = $qb->lists($this->field, $this->key);

        $this->handleAfter($qb);

		return $this->choices;
	}
    
    /**
     * 
     * @return Builder|null
     */
    protected function getQuery()
    {
		if($this->model instanceof Eloquent) {
			$qb = $this->model;
		}
		elseif($this->qb) {
			$qb = $this->qb;
		}
        elseif($this->container && $this->model) {
            $qb = $this->container->make($this->model);
        }
        else {
            return;
        }
        
        return $qb;
    }


    protected function handleBefore($qb)
    {        
		if($this->before) {
			call_user_func_array($this->before, array($qb, $this));
		}        
    }
    
    protected function handleAfter($qb)
    {        
		if($this->after) {
			call_user_func_array($this->after, array($qb, $this));
		}
    }

}