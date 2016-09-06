<?php

namespace Pepsit36\SummernoteBundle\Twig\Extension;

use Symfony\Bridge\Twig\Form\TwigRendererInterface;
use Symfony\Component\Form\FormView;

class FormExtension extends \Twig_Extension
{
    private $environment;

    public function __construct(\Twig_Environment $environment)
    {
        $this->environment = $environment;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction(
                'summernote_form_javascript',
                array($this, 'renderJavascript'),
                array('is_safe' => array('html'))
            ),
            new \Twig_SimpleFunction(
                'summernote_form_stylesheet',
                array($this, 'renderStylesheet'),
                array('is_safe' => array('html'))
            ),
        );
    }

    public function renderJavascript()
    {
        $this->template = $this->environment->loadTemplate(
            'Pepsit36SummernoteBundle:Form:summernoteJavascript.html.twig'
        );

        return $this->template->renderBlock(
            'summernote_javascript',
            array(
            )
        );
    }

    public function renderStylesheet()
    {
        $this->template = $this->environment->loadTemplate('@Pepsit36Summernote/Form/summernoteStylesheet.html.twig');

        return $this->template->renderBlock(
            'summernote_stylesheet',
            array(
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'pepsit3summernote.twig.extension.form';
    }
}
