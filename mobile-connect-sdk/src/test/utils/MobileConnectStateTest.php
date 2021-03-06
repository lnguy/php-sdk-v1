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

use MCSDK\discovery\DiscoveryResponse;
use MCSDK\utils\MobileConnectState;

class MobileConnectStateTest extends PHPUnit_Framework_TestCase
{

    public function testWithDiscoveryResponseAndEncryptedMSISDN()
    {
        $discoveryResponse = new DiscoveryResponse(false, new \DateTime(), 202, new Zend\Http\Headers(), new \stdClass());
        $encryptedMSISDN = 'testEncryptedMSISDN';

        $testMCState = new MobileConnectState($discoveryResponse, $encryptedMSISDN, null, null);

        $this->assertEquals($testMCState, MobileConnectState::withDiscoveryResponseAndEncryptedMSISDN($discoveryResponse, $encryptedMSISDN));
    }

    public function testMergeStateAndNonce()
    {
        $discoveryResponse = new DiscoveryResponse(false, new \DateTime(), 202, new Zend\Http\Headers(), new \stdClass());
        $encryptedMSISDN = 'testEncryptedMSISDN';

        $testMCState = new MobileConnectState($discoveryResponse, $encryptedMSISDN, null, null);

        $testState = 'anotherTestState3432678462873678';
        $testNonce = 'anotherTestNonce2386432798';

        $testAfterMergedMCState = new MobileConnectState($discoveryResponse, $encryptedMSISDN, $testState, $testNonce);

        $this->assertEquals($testAfterMergedMCState, MobileConnectState::mergeStateAndNonce($testMCState, $testState, $testNonce));
    }

    public function testGetDiscoveryResponse()
    {
        $discoveryResponse = new DiscoveryResponse(false, new \DateTime(), 202, new Zend\Http\Headers(), new \stdClass());
        $encryptedMSISDN = 'testEncryptedMSISDN';

        $testMCState = new MobileConnectState($discoveryResponse, $encryptedMSISDN, null, null);

        $this->assertEquals($discoveryResponse, $testMCState->getDiscoveryResponse());
    }

    public function testGetEncryptedMSISDN()
    {
        $discoveryResponse = new DiscoveryResponse(false, new \DateTime(), 202, new Zend\Http\Headers(), new \stdClass());
        $encryptedMSISDN = 'testEncryptedMSISDN';

        $testMCState = new MobileConnectState($discoveryResponse, $encryptedMSISDN, null, null);

        $this->assertEquals($encryptedMSISDN, $testMCState->getEncryptedMSISDN());
    }

    public function testGetState()
    {
        $discoveryResponse = new DiscoveryResponse(false, new \DateTime(), 202, new Zend\Http\Headers(), new \stdClass());
        $encryptedMSISDN = 'testEncryptedMSISDN';
        $testState = 'anotherTestState32234234324324';

        $testMCState = new MobileConnectState($discoveryResponse, $encryptedMSISDN, $testState, null);

        $this->assertEquals($testState, $testMCState->getState());
    }

    public function testGetNonce()
    {
        $discoveryResponse = new DiscoveryResponse(false, new \DateTime(), 202, new Zend\Http\Headers(), new \stdClass());
        $encryptedMSISDN = 'testEncryptedMSISDN';
        $testState = 'anotherTestState32234234324324';
        $testNonce = 'anotherTestNonce3454345543';

        $testMCState = new MobileConnectState($discoveryResponse, $encryptedMSISDN, $testState, $testNonce);

        $this->assertEquals($testNonce, $testMCState->getNonce());
    }
}