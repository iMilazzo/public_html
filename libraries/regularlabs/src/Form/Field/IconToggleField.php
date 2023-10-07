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

use Joomla\CMS\Layout\FileLayout as JFileLayout;
use RegularLabs\Library\Form\FormField as RL_FormField;

class IconToggleField extends RL_FormField
{
    protected function getInput()
    {
        return (new JFileLayout(
            'regularlabs.form.field.icontoggle',
            JPATH_SITE . '/libraries/regularlabs/layouts'
        ))->render(
            [
                'id'    => $this->id,
                'name'  => $this->name,
                'icon1' => strtolower($this->get('icon1', 'arrow-down')),
                'icon2' => $this->get('icon2', 'arrow-up'),
            ]
        );
    }
}
