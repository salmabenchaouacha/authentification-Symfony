<?php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('email', TextType::class);
        $form->add('name', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('email');
        $datagrid->add('name');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('email');
        $list->addIdentifier('name');
        $list->add(ListMapper::NAME_ACTIONS, null, [
            'actions' => [
                'show' => [
                
                ],
                'edit' => [
                   
                ],
                'delete' => [
                    
                ],
            ]]);
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('email');
        $show->add('name');
    }
}