<?php

namespace App\Form;

use App\Entity\Users;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class,[
                'label' => 'Nom',
                 'attr' => [    
                    
                    'placeholder' => 'Nom'
                ]    
            ])
            
            ->add('firstname', TextType::class,[
                'label' => 'Prenom',
                 'attr' => [    
                    
                    'placeholder' => 'Prénom'
                ]    
            ])
            ->add('adresse', TextType::class,[
                'label' => 'Adresse',
                 'attr' => [    
                   
                    'placeholder' => 'Your Adresse'
                ]    
            ])
            ->add('codecity', IntegerType::class,[
                'label' => 'Code Postal',
                 'attr' => [    
                   
                    'placeholder' => 'Code Postal'
                ]    
            ])
            ->add('email', EmailType::class,[
                'label' => 'Email',
                 'attr' => [    
                   
                    'placeholder' => 'Email'
                ]
            ])


            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'entrez votre mot de passe svp',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'votre mot de passe doit contenir au moins {{ limit }} caractères',
                     
                        'max' => 50,
                        'maxMessage' => 'votre mot de passe ne doit pas contenir plus de {{ limit }} caractères',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'vous devez accepter les termes.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
