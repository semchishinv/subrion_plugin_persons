<?php
/******************************************************************************
 *
 * Subrion - open source content management system
 * Copyright (C) 2017 Intelliants, LLC <https://intelliants.com>
 *
 * This file is part of Subrion.
 *
 * Subrion is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Subrion is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Subrion. If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @link https://subrion.org/
 *
 ******************************************************************************/

class iaPerson extends abstractModuleFront
{
    protected static $_table = 'persons';

    protected $_itemName = 'person';

    protected $_moduleName = 'persons';

    public $coreSearchEnabled = true;
    public $coreSearchOptions = [
        'regularSearchFields' => ['title', 'description'],
    ];


    public function getActive()
    {
        $sql = 'SELECT  p.* '
            . 'FROM `' . self::getTable(true) . '`  p '
            . 'WHERE  p.status = "active" '
            . 'ORDER BY p.`date_modified` DESC ';
        $rows = $this->iaDb->getAll($sql);
        $this->_processValues($rows);

        return $rows;
    }

    public function getFeatered()
    {
        $limit = $this->iaCore->get('persons_number_entry');
        $sql = 'SELECT SQL_CALC_FOUND_ROWS p.* '
            . 'FROM `' . self::getTable(true) . '`  p '
            . 'WHERE  p.featured = 1  AND p.status = "active" '
            . 'ORDER BY p.`date_modified` DESC LIMIT 0, '.$limit.' ';
        $rows = $this->iaDb->getAll($sql);
        $this->_processValues($rows);

        return $rows;
    }
}