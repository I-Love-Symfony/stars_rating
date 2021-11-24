<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Form\Type;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StarRateType extends HiddenType
{

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'half' => false,
            'size' => 40,
            'count' => 5,
            'empty_data' => "0",
            'attr' => [
                'value' => "0",
                'class' => 'hidden-stars-rating'
            ],
            'compound' => false,            
        ]);   

        $resolver->setAllowedTypes('half', 'bool');
        $resolver->setAllowedTypes('size', 'int');
        $resolver->setAllowedTypes('count', 'int');
    }

    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        $view->vars['half'] = $options['half'];
        $view->vars['size'] = $options['size'];
        $view->vars['count'] = $options['count'];
    }
	
	/**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): ?string
    {
        return 'rating';
    }
}
