<?php

namespace Illuminate3\Form\Element;

class TextTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var TextElement
	 */
	protected $element;

	public function setUp()
	{
		$this->element = new Text;
	}

	public function testTextElementHasDefaultView()
	{
		$this->assertSame('form::element.text', $this->element->getView());
	}

	public function testTextElementExtendsAbstractElement()
	{
		$this->assertInstanceof('Illuminate3\Form\Element\AbstractElement', $this->element);
	}

}
