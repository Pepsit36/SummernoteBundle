<?php

namespace Pepsit36\SummernoteBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SummernoteType extends AbstractType
{
    public function setDefaultOptions(OptionsResolver $resolver)
    {

    }

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