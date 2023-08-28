<?php

namespace Amida\OneClickOrder\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultFactory;
use Amida\OneClickOrder\Api\OneClickOrderRepositoryInterface;
use Magento\Framework\Controller\ResultInterface;

class Delete extends Action
{

    /**
     * @var OneClickOrderRepositoryInterface
     */
    private OneClickOrderRepositoryInterface $oneClickOrderRepository;

    /**
     * @param Context $context
     * @param OneClickOrderRepositoryInterface $oneClickOrderRepository
     */
    public function __construct(
        Context $context,
        OneClickOrderRepositoryInterface $oneClickOrderRepository
    ) {
        $this->oneClickOrderRepository = $oneClickOrderRepository;
        parent::__construct($context);
    }

    /**
     * Delete order
     *
     * @return ResponseInterface|Redirect|(Redirect&ResultInterface)|ResultInterface
     */
    public function execute()
    {
        $id = (int)$this->getRequest()->getParam('id');
        if (!$id) {
            $this->messageManager->addErrorMessage(__('There is no such order to delete.'));
        } else {
            try {
                $order = $this->oneClickOrderRepository->get($id);
                $this->oneClickOrderRepository->delete($order);
                $this->messageManager->addSuccessMessage(__('Order data has been successfully deleted.'));
            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__('Something is wrong! Can\'t delete data from DB!'));
            }
        }
        $result = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $result->setPath('*/*/index');
        return $result;
    }
}
