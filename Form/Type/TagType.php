<?php

namespace Anh\TaggableBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Validator\Constraints\NotBlank;

class TagType extends AbstractType
{
    /**
     * @var string
     *
     * Category entity class
     */
    protected $tagClass;

    public function __construct($tagClass)
    {
        $this->tagClass = $tagClass;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'constraints' => array(
                    new NotBlank(),
                )
            ))
            ->add('submit', 'submit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => $this->tagClass
        ));
    }

    public function getName()
    {
        return 'anh_taggable_form_type_tag';
    }
}
