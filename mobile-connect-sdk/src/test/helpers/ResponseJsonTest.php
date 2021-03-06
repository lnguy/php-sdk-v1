<?php

/**
 *                          SOFTWARE USE PERMISSION
 *
 *  By downloading and accessing this software and associated documentation
 *  files ("Software") you are granted the unrestricted right to deal in the
 *  Software, including, without limitation the right to use, copy, modify,
 *  publish, sublicense and grant such rights to third parties, subject to the
 *  following conditions:
 *
 *  The following copyright notice and this permission notice shall be included
 *  in all copies, modifications or substantial portions of this Software:
 *  Copyright © 2016 GSM Association.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS," WITHOUT WARRANTY OF ANY KIND, INCLUDING
 *  BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A
 *  PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 *  COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 *  WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
 *  IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 *  SOFTWARE. YOU AGREE TO INDEMNIFY AND HOLD HARMLESS THE AUTHORS AND COPYRIGHT
 *  HOLDERS FROM AND AGAINST ANY SUCH LIABILITY.
 */
require_once(dirname(__FILE__) . '/../bootstrap.php');

use MCSDK\helpers\ResponseJson;

class ResponseJsonTest extends PHPUnit_Framework_TestCase
{

    private $_status;
    private $_action;
    private $_parameter1;
    private $_parameter2;

    public function __construct()
    {
        $this->_status = 'testStatus';
        $this->_action = 'testAction';
        $this->_parameter1 = 'testParameter1';
        $this->_parameter2 = 'testParameter2';

        parent::__construct();
    }

    public function testGetStatus()
    {
        $responseJSONInstance = new ResponseJson($this->_status, $this->_action, $this->_parameter1, $this->_parameter2);

        $this->assertEquals($responseJSONInstance->getStatus(), $this->_status);
    }

    public function testGetAction()
    {
        $responseJSONInstance = new ResponseJson($this->_status, $this->_action, $this->_parameter1, $this->_parameter2);

        $this->assertEquals($responseJSONInstance->getAction(), $this->_action);
    }

    public function testGetParameter1()
    {
        $responseJSONInstance = new ResponseJson($this->_status, $this->_action, $this->_parameter1, $this->_parameter2);

        $this->assertEquals($responseJSONInstance->getParameter1(), $this->_parameter1);
    }

    public function testGetParameter2()
    {
        $responseJSONInstance = new ResponseJson($this->_status, $this->_action, $this->_parameter1, $this->_parameter2);

        $this->assertEquals($responseJSONInstance->getParameter2(), $this->_parameter2);
    }

    public function testGetAsString()
    {
        $testjsonString = json_encode(array('status' => $this->_status,
            'action' => $this->_action,
            'parameter1' => $this->_parameter1,
            'parameter2' => $this->_parameter2));

        $responseJSONInstance = new ResponseJson($this->_status, $this->_action, $this->_parameter1, $this->_parameter2);

        $this->assertEquals($responseJSONInstance->asString(), $testjsonString);
    }

}
