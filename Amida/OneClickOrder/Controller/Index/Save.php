<?php

namespace Amida\OneClickOrder\Controller\Index;

use Amida\OneClickOrder\Api\Data\OneClickOrderInterface;
use Amida\OneClickOrder\Model\ResourceModel\OneClickOrder;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\App\Request\Http;
use Amida\OneClickOrder\Model\OneClickOrderFactory;
use Amida\OneClickOrder\Api\OneClickOrderRepositoryInterface;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Controller\Result\RedirectFactory;

class Save implements HttpPostActionInterface
{

    /**
     * @var Http
     */
    private Http $request;

    /**
     * @var ManagerInterface
     */
    private ManagerInterface $messageManager;

    /**
     * @var RedirectFactory
     */
    private RedirectFactory $redirectFactory;

    /**
     * @var OneClickOrderFactory
     */
    private OneClickOrderFactory $oneClickOrderFactory;

    /**
     * @var OneClickOrderRepositoryInterface
     */
    private OneClickOrderRepositoryInterface $oneClickOrderRepository;

    /**
     * @param Http $request
     * @param OneClickOrderFactory $oneClickOrderFactory
     * @param OneClickOrderRepositoryInterface $oneClickOrderRepository
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $redirectFactory
     */
    public function __construct(
        Http $request,
        OneClickOrderFactory $oneClickOrderFactory,
        OneClickOrderRepositoryInterface $oneClickOrderRepository,
        ManagerInterface $messageManager,
        RedirectFactory $redirectFactory
    ) {
        $this->request = $request;
        $this->oneClickOrderFactory = $oneClickOrderFactory;
        $this->oneClickOrderRepository = $oneClickOrderRepository;
        $this->messageManager = $messageManager;
        $this->redirectFactory = $redirectFactory;
    }

    /**
     * Save order
     *
     * @return ResponseInterface|Redirect|ResultInterface
     */
    public function execute()
    {
        $data = $this->request->getParams();
        /** @var OneClickOrderInterface $order */
        $order = $this->oneClickOrderFactory->create();
        $order->setOrderSku($data['sku']);
        $order->setProductId($data['productId']);
        $order->setTelephoneNumber($data['telephone']);
        try {
            $this->oneClickOrderRepository->save($order);
            $this->messageManager->addSuccessMessage(__('Order data has been successfully saved.'));
        } catch (\Throwable $e) {
            $this->messageManager->addErrorMessage(__('Something is wrong! Can\'t save order data to DB!'));
        }
        $redirect = $this->redirectFactory->create();
        $redirect->setPath($data['url']);
        return $redirect;
    }
}
