<?php
namespace Customize\Form\Extension;

use Eccube\Form\Type\Admin\SearchOrderType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;


class SearchOrderTypeExtension extends AbstractTypeExtension
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {  
        $builder->add('buy_product_id', IntegerType::class, [
            'label' => '製品id',
            'required' => false,
        ]);

        $builder->add('customer_id', IntegerType::class, [
            'label' => 'ユーザーid',
            'required' => false,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {   
        return SearchOrderType::class;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getExtendedTypes(): iterable
    {
        yield SearchOrderType::class;
    }
}