<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                "attr" => ["class"=> "form-control" ],
                    "label"=>"E-mail"
                    ])
                    ->add('plainPassword', RepeatedType::class, [
                        // instead of being set onto the object directly,
                        // this is read and encoded in the controller
                        'mapped' => false,
                        'type' => PasswordType::class,
                        'invalid_message' => 'The password fields must match.',
                        'options' => ['attr' => ['class' => 'password-field form-control']],
                        'required' => true,
                        'first_options'  => ['label' => 'Mot de Passe'],
                        'second_options' => ['label' => 'Répéter Mot De Passe'],
                        'attr' => ['autocomplete' => 'new-password', 'class' => "form-control"],
                        'constraints' => [
                            new NotBlank([
                                'message' => 'Please enter a password',
                            ]),
                            new Length([
                                'min' => 6,
                                'minMessage' => 'Your password should be at least {{ limit }} characters',
                                // max length allowed by Symfony for security reasons
                                'max' => 15,
                            ]),
                        ],
                    ])
            ->add('nom', TextType::class, [
                "attr" => ["class"=> "form-control" ],
                "label"=>"Nom"
            ])
            ->add('prenom', TextType::class, [
                "attr" => ["class"=> "form-control" ],
                "label"=>"Prénom"
            ])
            ->add('telephone', TextType::class, [
                "attr" => ["class"=> "form-control" ],
                "label"=>"Téléphone"
            ] )
            ->add('imageFile', VichFileType::class, [
                'required' => true,
                "attr" => ["class"=> "form-control-file" ],
                "label"=>"Photo de profil"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
