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

use MCSDK\discovery\DiscoveryOptions;

class DiscoveryOptionsTest extends PHPUnit_Framework_TestCase
{

    public function testConstructDefaults()
    {
        $discoveryOptions = new DiscoveryOptions();

        $this->assertEquals($discoveryOptions->getTimeout(), DiscoveryOptions::DEFAULT_TIMEOUT);
        $this->assertEquals($discoveryOptions->isManuallySelect(), DiscoveryOptions::DEFAULT_MANUALLY_SELECT);
        $this->assertEquals($discoveryOptions->isCookiesEnabled(), DiscoveryOptions::DEFAULT_COOKIES_ENABLED);
    }

    public function testSetAndIsManuallySelect()
    {
        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setManuallySelect(true);

        $this->assertTrue($discoveryOptions->isManuallySelect());
    }

    public function testSetAndGetIdentifiedMCC()
    {
        $testMCC = 'GB';

        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setIdentifiedMCC($testMCC);

        $this->assertEquals($testMCC, $discoveryOptions->getIdentifiedMCC());
    }

    public function testSetAndGetIdentifiedMNC()
    {
        $testMNC = 'GB';

        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setIdentifiedMNC($testMNC);

        $this->assertEquals($testMNC, $discoveryOptions->getIdentifiedMNC());
    }

    public function testSetAndIsCookiesEnabled()
    {
        $cookiesEnabled = false;

        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setCookiesEnabled($cookiesEnabled);

        $this->assertEquals($cookiesEnabled, $discoveryOptions->isCookiesEnabled());
    }

    public function testSetAndIsUsingMobileData()
    {
        $usingMobileData = false;

        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setUsingMobileData($usingMobileData);

        $this->assertEquals($usingMobileData, $discoveryOptions->isUsingMobileData());
    }

    public function testSetAndGetLocalClientIP()
    {
        $localClientIP = '10.0.0.1';

        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setLocalClientIP($localClientIP);

        $this->assertEquals($localClientIP, $discoveryOptions->getLocalClientIP());
    }

    public function testSetAndGetClientIP()
    {
        $clientIP = '10.0.0.2';

        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setClientIP($clientIP);

        $this->assertEquals($clientIP, $discoveryOptions->getClientIP());
    }

    public function testSetAndGetTimeout()
    {
        $timeout = '10.0.0.2';

        $discoveryOptions = new DiscoveryOptions();
        $discoveryOptions->setTimeout($timeout);

        $this->assertEquals($timeout, $discoveryOptions->getTimeout());
    }

}
