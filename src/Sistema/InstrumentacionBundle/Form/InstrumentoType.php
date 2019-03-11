<?php

namespace Sistema\InstrumentacionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InstrumentoType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                 
               
               ->add('nombre')          
               
               ->add('codigo')          
               
               ->add('rango')          
               
               ->add('modelo')          
               
               ->add('situacionid','entity', array('class' => 'InstrumentacionBundle:Situacion','mapped'=> true,'label' => 'Situacion','attr'=> array('class' => 'Situacionid_selector input-medium select2me','data-placeholder'=>'Select...',),))
                         
               
               ->add('magnitudid','entity', array('class' => 'InstrumentacionBundle:Magnitud','mapped'=> true,'label' => 'Magnitud','attr'=> array('class' => 'Magnitudid_selector input-medium select2me','data-placeholder'=>'Select...',),))
                         
               
               ->add('areaid','entity', array('class' => 'DocumentacionBundle:Area','mapped'=> true,'label' => 'Area','attr'=> array('class' => 'Areaid_selector input-medium select2me','data-placeholder'=>'Select...',),))
                         
               
               ->add('exactitudid','entity', array('class' => 'InstrumentacionBundle:Exactitud','mapped'=> true,'label' => 'Exactitud','attr'=> array('class' => 'Exactitudid_selector input-medium select2me','data-placeholder'=>'Select...',),))
                         
               
               ->add('equipoid','entity', array('class' => 'InstrumentacionBundle:Equipo','mapped'=> true,'label' => 'Equipo','attr'=> array('class' => 'Equipoid_selector input-medium select2me','data-placeholder'=>'Select...',),))
                        
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sistema\InstrumentacionBundle\Entity\Instrumento'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'sistema_instrumentacionbundle_instrumento';
    }
}
