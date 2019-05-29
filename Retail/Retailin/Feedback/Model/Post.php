<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Retailin\Feedback\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends \Magento\Framework\Model\AbstractModel
{

    protected function _construct()
    {
        $this->_init('Retailin\Feedback\Model\ResourceModel\Post');
    }
}

