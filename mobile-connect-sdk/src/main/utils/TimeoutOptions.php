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

namespace MCSDK\utils;

/**
 * Class to hold an optional time out value used in methods in {@link com.gsma.mobileconnect.discovery.IDiscovery}
 */
class TimeoutOptions
{

    /**
     * Default timeout for a Rest call in milliseconds.
     */
    const DEFAULT_TIMEOUT = 30000;

    private $timeout;

    /**
     * TimeoutOptions constructor.
     */
    public function __construct()
    {
        $this->timeout = self::DEFAULT_TIMEOUT;
    }

    /**
     * Return the timeout value to be used by the SDK for a Rest request.
     *
     * @return int The timeout to be used.
     */
    public function getTimeout()
    {
        return $this->timeout;
    }

    /**
     * Set the timeout of a Rest request.
     *
     * The timeout (in milliseconds) to be used by the SDK when making a Rest request.
     *
     * @param int $newValue New timeout value.
     */
    public function setTimeout($newValue)
    {
        $this->timeout = $newValue;
    }

}
