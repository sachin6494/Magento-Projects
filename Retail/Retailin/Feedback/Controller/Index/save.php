<?php
namespace Retailin\Feedback\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Retailin\Feedback\Model\PostFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Session\SessionManagerInterface;

class save extends Action
{

    protected $_modelPostFactory;
    protected $resultPageFactory;
    protected $_sessionManager;

    public function __construct(
        Context $context,
        PostFactory $modelPostFactory,
        PageFactory $resultPageFactory,
        SessionManagerInterface $sessionManager
    ) {
        parent::__construct($context);
        $this->_modelPostFactory = $modelPostFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->_sessionManager = $sessionManager;
    }

    public function execute()
    {
        $resultRedirect     = $this->resultRedirectFactory->create();
        $postmodel      = $this->_modelPostFactory->create();
        $data               = $this->getRequest()->getPost();        
        $postmodel->setdata('firstname', $data['firstname']);
        $postmodel->setdata('lastname', $data['lastname']);
        $postmodel->setData('phone', $data['phone']);
        $postmodel->setData('email', $data['email']);
        $postmodel->setData('comment', $data['comment']);

        $postmodel->save();
        $this->messageManager->addSuccess( __('Insert Record Successfully !') );
        $this->_redirect('/feedback/Index/review');
    }
}
