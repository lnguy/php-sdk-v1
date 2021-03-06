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

namespace MCSDK\impl;

use MCSDK\cache\DiscoveryCacheImpl;
use MCSDK\cache\IDiscoveryCache;
use MCSDK\utils\RestClient;

class Factory
{

    /**
     * Factory method to create an implementation of the IDiscovery interface.
     *
     * This version is primarily for testing.
     *
     * @param IDiscoveryCache $cache The cache to be used. (Optional).
     * @param RestClient $restClient The rest client to be used. (Required).
     * @return DiscoveryImpl An implementation of {@link IDiscovery}
     */
    public static function getDiscovery(IDiscoveryCache $cache, RestClient $restClient = null)
    {
        if (is_null($restClient)) {
            return new DiscoveryImpl($cache, new RestClient());
        }

        return new DiscoveryImpl($cache, $restClient);
    }

    /**
     * Factory method to create an implementation of the {@link IOIDC} interface.
     *
     * This version is primarily for testing.
     *
     * @param RestClient $restClient The rest client to be used. (Required).
     * @return OIDCImpl An implementation of {@link IOIDC}
     */
    public static function getOIDC(RestClient $restClient = null)
    {
        if (is_null($restClient)) {
            return self::getOIDC(new RestClient());
        }

        return new OIDCImpl($restClient);
    }

    /**
     * Factory method to create a default implementation of {@link IDiscoveryCache} that uses a Zend Backend Cache class
     * as a backing store.
     *
     * @return DiscoveryCacheImpl A default implementation of {@link IDiscoveryCache}
     */
    public static function getDefaultDiscoveryCache()
    {
        return new DiscoveryCacheImpl();
    }

}
