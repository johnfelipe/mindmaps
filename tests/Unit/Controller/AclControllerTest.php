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

namespace OCA\Mindmaps\Tests\Unit\Controller;

use OCA\Mindmaps\Controller\AclController;
use OCA\Mindmaps\Service\AclService;
use OCA\Mindmaps\Tests\Unit\UnitTestCase;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

class AclControllerTest extends UnitTestCase {

	/** @var AclController */
    private $controller;
    /** @var IRequest */
    private $request;
    /** @var AclService */
    private $aclService;

    private $userId = 'john';

	/**
	 * {@inheritDoc}
	 */
    public function setUp() {
        $this->request = $this->getMockBuilder('OCP\IRequest')
            ->disableOriginalConstructor()
            ->getMock();
        $this->aclService = $this->getMockBuilder(
            '\OCA\Mindmaps\Service\AclService')
            ->disableOriginalConstructor()
            ->getMock();

        $this->controller = new AclController(
            'mindmaps', $this->request, $this->aclService, $this->userId
        );
    }

	/**
	 * Basic controller index route test.
	 */
    public function testIndex() {
        $result = $this->controller->index(0);
        $this->assertInstanceOf(DataResponse::class, $result);
    }
}
