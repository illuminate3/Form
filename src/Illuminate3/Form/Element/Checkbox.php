<?php

namespace Illuminate3\Form\Element;

class Checkbox extends AbstractElement implements Type\MultipleChoice
{
	protected $choices = array();
	protected $view = 'form::element.checkboxes';
	protected $value = array();
	protected $attributes = array();

	/**
	 * @param $choices
	 * @return $this
	 */
	public function choices(Array $choices)
	{
		$this->choices = $choices;
		return $this;
	}

	/**
	 * @return array
	 */
	public function getChoices()
	{
		return $this->choices;
	}
}