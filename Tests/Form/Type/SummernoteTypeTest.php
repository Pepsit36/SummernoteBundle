<?php

namespace Pepsit36\SummernoteBundle\Tests\Form\Type;


use Pepsit36\SummernoteBundle\Form\Type\SummernoteType;
use Symfony\Component\Form\Test\TypeTestCase;

class SummernoteTypeTest extends TypeTestCase
{
    public function testSummernoteTypeNotNull()
    {
        $form = $this->factory->create(SummernoteType::class);
        $view = $form->createView();

        $this->assertNotNull($view);
    }
}
