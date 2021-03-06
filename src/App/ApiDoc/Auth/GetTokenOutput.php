<?php
/**
 * /src/App/ApiDoc/Auth/GetTokenOutput.php
 *
 * @author  TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
namespace App\ApiDoc\Auth;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class GetTokenOutput
 *
 * @category    APIDoc
 * @package     App\ApiDoc\Auth
 * @author      TLe, Tarmo Leppänen <tarmo.leppanen@protacon.com>
 */
class GetTokenOutput extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'token',
                Type\TextType::class,
                [
                    'label'         => 'Username',
                    'required'      => true,
                    'description'   => 'Json Web Token for authentication',
                ]
            )
            ->add(
                'refresh_token',
                Type\TextType::class,
                [
                    'required'      => true,
                    'description'   => 'Refresh token.',
                ]
            )
        ;
    }
}