<?php

namespace Pepsit36\SummernoteBundle\Twig\Extension;

use Symfony\Bridge\Twig\Form\TwigRendererInterface;
use Symfony\Component\Form\FormView;

class FormExtension extends \Twig_Extension implements \Twig_Extension_GlobalsInterface
{
    private $environment;
    private $widgetConfig;

    public function __construct(\Twig_Environment $environment, $widgetConfig)
    {
        $this->environment = $environment;
        $this->widgetConfig = $widgetConfig;
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


        //Toolbar
        $toolbar = array();
        foreach ($this->widgetConfig['toolbar'] as $buttonsGroup) {
            $toolbar[] = array($buttonsGroup['name'], $buttonsGroup['buttons']);
        }



        return $this->template->renderBlock(
            'summernote_javascript',
            array(
                'pepsit36_summernote_config_width' => $this->widgetConfig['width'],
                'pepsit36_summernote_config_height' => $this->widgetConfig['height'],
                'pepsit36_summernote_config_focus' => $this->widgetConfig['focus'],
                'pepsit36_summernote_config_toolbar' => json_encode($toolbar),
                'pepsit36_summernote_config_styleTags' => json_encode($this->widgetConfig['styleTags']),
                'pepsit36_summernote_config_fontNames' => json_encode($this->widgetConfig['fontNames']),
                'pepsit36_summernote_config_fontSizes' => json_encode($this->widgetConfig['fontSizes']),
                'pepsit36_summernote_config_colors' => json_encode($this->widgetConfig['colors']),
            )
        );
    }

    public function renderStylesheet()
    {
        $this->template = $this->environment->loadTemplate('@Pepsit36Summernote/Form/summernoteStylesheet.html.twig');

        return $this->template->renderBlock(
            'summernote_stylesheet',
            array()
        );
    }

    /**
     * {@inheritdoc}
     */
    public
    function getName()
    {
        return 'pepsit3summernote.twig.extension.form';
    }
}
