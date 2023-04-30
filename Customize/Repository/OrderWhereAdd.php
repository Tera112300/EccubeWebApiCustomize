<?php
namespace Customize\Repository;

use Eccube\Doctrine\Query\QueryCustomizer;
use Eccube\Repository\QueryKey;
use Doctrine\ORM\QueryBuilder;

class OrderWhereAdd implements QueryCustomizer {

    public function customize(QueryBuilder $builder, $params, $queryKey)
    {
        if (isset($params['buy_product_id']) && is_numeric($params['buy_product_id'])) {
            $builder->andWhere('oi.id = :buy_product_id')->setParameter('buy_product_id', $params['buy_product_id']);
        }
        if (isset($params['customer_id']) && is_numeric($params['customer_id'])) {
            $builder->andWhere('o.Customer = :customer_id')->setParameter('customer_id', $params['customer_id']);
        }
    }

    public function getQueryKey(): string
    {
        // 適用したいメソッドを指定することで、自動的に有効になる。ドキュメント参照
        //https://doc4.ec-cube.net/customize_repository
        return QueryKey::ORDER_SEARCH_ADMIN;
    }
}