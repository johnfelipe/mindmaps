<?php
/**
 * @copyright Copyright (c) 2017 Kai Schröer <git@schroeer.co>
 *
 * @author Kai Schröer <git@schroeer.co>
 *
 * @license GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\Mindmaps\Db;

use JsonSerializable;

/**
 * @method int getMindmapId()
 * @method void setMindmapId(int $mindmapId)
 * @method string getParentId()
 * @method void setParentId(int $parentId)
 * @method string getUserId()
 * @method void setUserId(string $userId)
 * @method string getX()
 * @method void setX(int $x)
 * @method string getY()
 * @method void setY(int $y)
 * @method string getLabel()
 * @method void setLabel(string $label)
 * @method string getLockedBy()
 * @method void setLockedBy(string $lockedBy)
 */
class MindmapNode extends Model implements JsonSerializable {

    protected $mindmapId;
    protected $parentId;
    protected $userId;
    protected $x;
    protected $y;
    protected $label;
    protected $lockedBy;

    /**
     * MindmapNode constructor.
     */
    public function __construct() {
        $this->addType('mindmapId', 'integer');
        $this->addType('parentId', 'integer');
        $this->addType('x', 'integer');
        $this->addType('y', 'integer');
    }

    /**
     * Return object as json string.
     *
     * @return array
     */
    public function jsonSerialize() {
        return [
            'id' => $this->id,
            'mindmapId' => $this->mindmapId,
            'parentId' => $this->parentId,
            'userId' => $this->userId,
            'x' => $this->x,
            'y' => $this->y,
            'label' => $this->label,
            'lockedBy' => $this->lockedBy
        ];
    }
}
