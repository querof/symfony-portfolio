<?php

namespace querof\CodeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActivityTicketType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('begindate',null,array('widget' => 'single_text',
                                        'attr'=>array('class'=>'form-control calendar',)))
                 ->add('enddate',null,array('widget' => 'single_text',
                                                 'attr'=>array('class'=>'form-control calendar',)))
                 ->add('activity',null,array('attr'=>array('class'=>'form-control')))
                 ->add('ticket',null,array('attr'=>array('class'=>'form-control')))
                 ->add('analyst',null,array('attr'=>array('class'=>'form-control')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'querof\CodeBundle\Entity\ActivityTicket'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'querof_codebundle_activityticket';
    }


}
