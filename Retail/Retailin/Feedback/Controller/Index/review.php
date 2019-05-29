<?php

namespace Retailin\Feedback\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class review extends \Magento\Framework\App\Action\Action
{
    
    /**
     * Booking action
     *
     * @return void
     */
    public function execute()
    {
        // 1. POST request : Get booking data
        $post = (array) $this->getRequest()->getPost();

        if (!empty($post)) {
            // Retrieve your form data
            $firstname     = $post['firstname'];
            $lastname     = $post['lastname'];
            $phone    = $post['phone'];
            $email    = $post['email'];
            $comment  = $post['comment'];

            // Doing-something with...

            // Display the succes form validation message
            //$this->messageManager->addSuccessMessage('Feedback Message !');

            // Redirect to your form page (or anywhere you want...)
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setUrl('/Magento2/feedback/index/review');

            return $resultRedirect;
        }
        // 2. GET request : Render the booking page
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
