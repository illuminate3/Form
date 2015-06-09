<?php

namespace Illuminate3\Form\Element\Type;

interface Choice
{
	public function choices(Array $choices);
	public function getChoices();
}