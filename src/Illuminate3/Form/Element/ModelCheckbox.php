<?php

namespace Illuminate3\Form\Element;

class ModelCheckbox extends ModelElement implements Type\MultipleChoice
{
	protected $view = 'form::element.checkboxes';
	protected $value = array();
	protected $attributes = array();
}