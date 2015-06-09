<?php

namespace Illuminate3\Form\Element\Type;

interface Textarea
{
	public function cols($cols);
	public function rows($rows);

	public function getCols();
	public function getRows();
}