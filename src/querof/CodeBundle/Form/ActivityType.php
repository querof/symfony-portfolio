<?php

namespace querof\CodeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',null,array('attr'=>array('class'=>'form-control')))
                ->add('duration',null,array('attr'=>array('class'=>'form-control touchspin')))
                ->add('service',null,array('attr'=>array('class'=>'form-control select2')))
                ->add('category',null,array('attr'=>array('class'=>'form-control select2')))
                ->add('roles',null,array('attr'=>array('class'=>'form-control select2')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'querof\CodeBundle\Entity\Activity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'querof_codebundle_activity';
    }


}
