<?php

namespace Pepsit36\SummernoteBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SummernoteType extends AbstractType {
    public function getParent() {
        $symfonyVersion = explode('.', \Symfony\Component\HttpKernel\Kernel::VERSION)[0];
        if ($symfonyVersion == 2) {
            return 'textarea';
        } else {
            return TextareaType::class;
        }
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(
            array(
                'pepsit36_summernote_form_options' => '',
            )
        );
    }


    public function buildView(FormView $view, FormInterface $form, array $options) {
        $view->vars['pepsit36_summernote_form_options'] = $options['pepsit36_summernote_form_options'];
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->setAttribute('pepsit36_summernote_form_options', $options['pepsit36_summernote_form_options']);
    }

    /**
     * {@inheritdoc}
     */
    public function getName() {
        return 'summernote';
    }
}
