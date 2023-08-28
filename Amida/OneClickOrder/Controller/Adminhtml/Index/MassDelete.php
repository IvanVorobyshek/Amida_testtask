<?php

namespace Amida\OneClickOrder\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Amida\OneClickOrder\Api\OneClickOrderRepositoryInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class MassDelete extends Action
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
        OneClickOrderRepositoryInterface $oneClickOrderRepository,
    ) {
        $this->oneClickOrderRepository = $oneClickOrderRepository;
        parent::__construct($context);
    }

    /**
     * Delete orders
     *
     * @return ResponseInterface|ResultInterface|void
     */
    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $Ids = $data['selected'];
        $sizeIds = count($Ids);
        try {
            foreach ($Ids as $Id) {
                $this->oneClickOrderRepository->deleteById($Id);
            }
            $sizeIds === 1 ? $this->messageManager->addSuccessMessage(__('Order data has been successfully deleted.')) :
                $this->messageManager->addSuccessMessage(__('Orders data has been successfully deleted.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__($e->getMessage()));
        }
        $this->_redirect('*/*/');
    }
}
