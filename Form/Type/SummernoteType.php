<?php

namespace Pepsit36\SummernoteBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SummernoteType extends AbstractType
{
    public function getParent()
    {
        return TextareaType::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'summernote';
    }


}
