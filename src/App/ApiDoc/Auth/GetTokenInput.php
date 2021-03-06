<?php
/**
 * /src/App/ApiDoc/Auth/GetTokenInput.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\ApiDoc\Auth;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class GetTokenInput
 *
 * @category    APIDoc
 * @package     App\ApiDoc\Auth
 * @author      TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class GetTokenInput extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'username',
                Type\TextType::class,
                [
                    'label'         => 'Username',
                    'required'      => true,
                    'description'   => 'Username',
                ]
            )
            ->add(
                'password',
                Type\TextType::class,
                [
                    'required'      => true,
                    'description'   => 'Password',
                ]
            )
        ;
    }
}
