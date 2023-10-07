<?php
/**
 * @package         Regular Labs Library
 * @version         23.4.9077
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://regularlabs.com
 * @copyright       Copyright © 2023 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Library\Form\Field;

defined('_JEXEC') or die;

use RegularLabs\Library\Form\FormField as RL_FormField;
use RegularLabs\Library\License as RL_License;

class LicenseField extends RL_FormField
{
    protected function getInput()
    {
        $extension = $this->get('extension');

        if (empty($extension))
        {
            return '';
        }

        return RL_License::getMessage($extension, true);
    }

    protected function getLabel()
    {
        return '';
    }
}
