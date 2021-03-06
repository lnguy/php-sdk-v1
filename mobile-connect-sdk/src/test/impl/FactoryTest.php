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

use MCSDK\cache\DiscoveryCacheImpl;
use MCSDK\impl\Factory;
use MCSDK\utils\RestClient;

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testGetDiscoveryWithNullRestClient()
    {
        $cache = new DiscoveryCacheImpl();

        $response = Factory::getDiscovery($cache, null);

        $this->assertInstanceOf('MCSDK\impl\DiscoveryImpl', $response);
    }

    public function testGetDiscoveryWithActualRestClient()
    {
        $cache = new DiscoveryCacheImpl();
        $restClient = new RestClient();

        $response = Factory::getDiscovery($cache, $restClient);

        $this->assertInstanceOf('MCSDK\impl\DiscoveryImpl', $response);
    }

    public function testGetOIDCWithNullRestClient()
    {
        $response = Factory::getOIDC(null);

        $this->assertInstanceOf('MCSDK\impl\OIDCImpl', $response);
    }

    public function testGetOIDCWithActualRestClient()
    {
        $restClient = new RestClient();

        $response = Factory::getOIDC($restClient);

        $this->assertInstanceOf('MCSDK\impl\OIDCImpl', $response);
    }

    public function testGetDefaultDiscoveryCache()
    {
        $response = Factory::getDefaultDiscoveryCache();

        $this->assertInstanceOf('MCSDK\cache\DiscoveryCacheImpl', $response);
    }
}