<?php

namespace Illuminate3\Form;

use Illuminate\Container\Container;

class FormElementContainer extends Container
{
	/**
	 * The registered type aliases.
	 *
	 * @var array
	 */
	protected $aliases = array(
		'text' 			=>	'Illuminate3\Form\Element\Text',
		'hidden' 		=>	'Illuminate3\Form\Element\Hidden',
		'password' 		=>	'Illuminate3\Form\Element\Password',
		'textarea' 		=>	'Illuminate3\Form\Element\Textarea',
		'select' 		=> 	'Illuminate3\Form\Element\Select',
		'modelSelect' 	=>	'Illuminate3\Form\Element\ModelSelect',
		'checkbox' 		=> 	'Illuminate3\Form\Element\Checkbox',
		'modelCheckbox' =>	'Illuminate3\Form\Element\ModelCheckbox',
		'radio' 		=> 	'Illuminate3\Form\Element\Radio',
		'modelRadio' 	=> 	'Illuminate3\Form\Element\ModelRadio',
	);
}