<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Колюха
 * Date: 09.08.14
 * Time: 17:15
 * To change this template use File | Settings | File Templates.
 */

namespace Letim\RegisterBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('email', 'email',array(
            'label'=> 'Почта'
        ));
        $builder->add('username', 'text',array(
            'label'=> 'Логин'
        ));
        $builder->add('pass', 'repeated', array(
            'label'=> "Пароль",
            'first_name'  => 'password',
            'second_name' => 'confirm',
            'type'        => 'password',
            'first_options'  => array('label' => 'Пароль'),
            'second_options' => array('label' => 'Пароль еще раз'),
        ));
        $builder->add('Register', 'submit', array('label' => 'Регистрация'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Letim\RegisterBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'user';
    }
}