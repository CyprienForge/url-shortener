<?php

namespace App\Infrastructure\Symfony\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class UrlForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('url', TextType::class, [
                'attr' => [
                    'class' => 'url-input form-control input-lg',
                    'placeholder' => 'Collez votre URL longue ici...',
                    'autocomplete' => 'off',
                    'id' => 'urlInput'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'attr' => [
                    'class' => 'submit-btn btn btn-primary btn-lg',
                ],
                'label' => '<i class="fas fa-scissors"></i> Raccourcir',
                'label_html' => true,
            ])
        ;
    }
}
