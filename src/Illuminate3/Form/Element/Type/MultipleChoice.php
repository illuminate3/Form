<?php

namespace Illuminate3\Form\Element\Type;

interface MultipleChoice
{
	public function choices(Array $choices);
	public function getChoices();
}