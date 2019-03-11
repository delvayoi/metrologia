<?php

namespace Sistema\InstrumentacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CalibracionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaultima')
            ->add('fechareal')
            ->add('fechaproxima')
            ->add('servicioporid')
            ->add('frecuenciacalid')
            ->add('instrumentoid')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InstrumentacionBundle\Entity\Calibracion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_instrumentacionbundle_calibracion';
    }
}
