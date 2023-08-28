<?php

namespace Amida\OneClickOrder\ViewModel\Catalog\Product;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Block\Product\View;

class Buy implements ArgumentInterface
{

    /**
     * @var Product
     */
    private Product $product;

    /**
     * @var View
     */
    private View $view;

    /**
     * @param Product $product
     * @param View $view
     */
    public function __construct(
        Product $product,
        View $view,
    ) {
        $this->product = $product;
        $this->view = $view;
    }

    /**
     * Get Product SKU
     *
     * @return string
     */
    public function getProductSku()
    {
        $sku = $this->view->getProduct()->getSku();
        return $sku;
    }

    /**
     * Get Product ID
     *
     * @return int
     */
    public function getProductId()
    {
        $id = $this->view->getProduct()->getId();
        return $id;
    }
}
