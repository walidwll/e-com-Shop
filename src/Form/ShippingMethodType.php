<?php
namespace App\Form;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\ShippingMethod;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotNull;

class ShippingMethodType extends AbstractType
{
    private $objectManager;

    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('shippingMethod', EntityType::class, [
            //     'class' => ShippingMethod::class,
            //     'expanded' => true,
            //     'choices' => $this->objectManager
            //         ->getRepository(ShippingMethod::class)
            //         ->findAll(),
            //     'choice_label' => function (ShippingMethod $method) {
            //         return $method->getName();
            //     },
            //     'constraints' => [
            //         new NotNull(),
            //     ]
            // ])
            ->add('name')
            ->add('fee')
            ->add('dateCreated')
            ->add('active')
            ->add('suivant',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ShippingMethod::class,
        ]);
    }
}
