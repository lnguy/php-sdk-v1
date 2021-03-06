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

class DiscoveryResponseTest extends PHPUnit_Framework_TestCase
{

    private $cached;
    private $ttl;
    private $responseCode;
    private $headers;
    private $responseData;
    private $discoveryResponse;

    public function __construct()
    {
        $this->cached = true;
        $this->ttl = $this->getYesterdaysDateTime();
        $this->responseCode = 30;
        $this->headers = new \Zend\Http\Headers();
        $this->responseData = $this->getResponseStub();

        parent::__construct();
    }

    private function getYesterdaysDateTime()
    {
        $dateTime = new \DateTime();
        $dateTime->sub(new \DateInterval('P1D'));

        return $dateTime;
    }

    private function getResponseStub()
    {
        $response = new \stdClass();
        $response->test = true;
        $response->serviceId = 12345;

        return $response;
    }

    public function testAllMethods()
    {
        $this->discoveryResponse = new DiscoveryResponse($this->cached, $this->ttl, $this->responseCode, $this->headers, $this->responseData);

        $this->assertEquals($this->cached, $this->discoveryResponse->isCached());
        $this->assertEquals($this->ttl, $this->discoveryResponse->getTtl());
        $this->assertEquals($this->responseCode, $this->discoveryResponse->getResponseCode());
        $this->assertEquals($this->headers, $this->discoveryResponse->getHeaders());
        $this->assertEquals($this->responseData, $this->discoveryResponse->getResponseData());

        $this->assertTrue($this->discoveryResponse->hasExpired());
    }

}
