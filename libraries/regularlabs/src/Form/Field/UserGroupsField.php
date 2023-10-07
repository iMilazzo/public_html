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

use RegularLabs\Library\DB as RL_DB;
use RegularLabs\Library\Form\FormField as RL_FormField;

class UserGroupsField extends RL_FormField
{
    static      $options;
    public bool $is_select_list  = true;
    public bool $use_tree_select = true;

//    public bool $use_ajax        = true;

    public function getNamesByIds($values, $attributes)
    {
        $query = $this->db->getQuery(true)
            ->select('a.title')
            ->from('#__usergroups AS a')
            ->where(RL_DB::is('a.id', $values))
            ->order('a.lft ASC');

        $this->db->setQuery($query);

        return $this->db->loadColumn();
    }

    protected function getOptions()
    {
        if ( ! empty(self::$options))
        {
            return self::$options;
        }

        $query = $this->db->getQuery(true)
            ->select('a.id as value, a.title as text, a.parent_id AS parent')
            ->from('#__usergroups AS a')
            ->select('COUNT(DISTINCT b.id) AS level')
            ->join('LEFT', '#__usergroups AS b ON a.lft > b.lft AND a.rgt < b.rgt')
            ->group('a.id')
            ->order('a.lft ASC');
        $this->db->setQuery($query);

        self::$options = $this->db->loadObjectList();

        return self::$options;
    }
}
