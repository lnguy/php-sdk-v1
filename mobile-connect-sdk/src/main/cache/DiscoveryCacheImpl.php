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

namespace MCSDK\cache;

use MCSDK\utils\Constants;
use Zend\Cache\Storage\Adapter\Filesystem;
use Zend\Cache\Storage\Plugin\ExceptionHandler;

/**
 * Implementation of IDiscoveryCache that uses a Zend Cache instance as a
 * backing store.
 */
class DiscoveryCacheImpl implements IDiscoveryCache
{

    private $_cache;

    /**
     * DiscoveryCacheImpl constructor.
     */
    public function __construct()
    {
        $this->_cache = new Filesystem();
        $this->_cache->getOptions()->setNamespace('/');

        $plugin = new ExceptionHandler();
        $plugin->getOptions()->setThrowExceptions(true);
        $this->_cache->addPlugin($plugin);
    }

    /**
     * Return the cache object
     *
     * @return Filesystem
     */
    public function getCache()
    {
        return $this->_cache;
    }

    /**
     * Adds a new cache value by key
     *
     * @param DiscoveryCacheKey|null $key
     * @param DiscoveryCacheValue|null $value
     * @return bool
     */
    public function add(DiscoveryCacheKey $key = null, DiscoveryCacheValue $value = null)
    {
        $this->validateKey($key);
        $this->validateValue($value);

        $cachedValue = $this->buildCacheValue($value);

        return $this->_cache->setItem($key->getKey(), serialize($cachedValue));
    }

    /**
     * Get cache value by key
     *
     * @param DiscoveryCacheKey $key The cache key
     * @return DiscoveryCacheValue|null
     */
    public function get(DiscoveryCacheKey $key)
    {
        $this->validateKey($key);

        $value = unserialize($this->_cache->getItem($key->getKey()));

        if (null == $value) {
            return null;
        }
        if ($value->hasExpired()) {
            unset($this->_cache->{$key->getKey()});
            return null;
        }

        return $this->buildCacheValue($value);
    }

    /**
     * Remove cache value by key
     *
     * @param DiscoveryCacheKey $key
     */
    public function remove(DiscoveryCacheKey $key)
    {
        $this->validateKey($key);
        $this->_cache->removeItem($key->getKey());
    }

    /**
     * Clear the whole cache
     */
    public function clear()
    {
        $this->_cache->clearByNamespace('/');
    }

    /**
     * Determine if a given parameter is a valid DiscoveryCacheKey
     *
     * @param mixed $key param to be tested
     */
    private function validateKey($key)
    {
        if (is_null($key)) {
            throw new \InvalidArgumentException("Key cannot be null");
        }
    }

    /**
     * Determine is a value is a valid DiscoveryCacheValue
     *
     * @param mixed $value param to be tested
     */
    private function validateValue($value)
    {
        if (is_null($value)) {
            throw new \InvalidArgumentException("Value cannot be null");
        }
    }

    /**
     * Instantiate a new DiscoveryCacheValue object
     *
     * @param DiscoveryCacheValue $value the value to be cloned
     * @return DiscoveryCacheValue a new instance of the DiscoveryCacheValue using a given string value and ttl
     */
    private function buildCacheValue(DiscoveryCacheValue $value)
    {
        $copy = clone $value;
        unset($copy->{Constants::SUBSCRIBER_ID_FIELD_NAME});

        return new DiscoveryCacheValue($copy->getTtl(), $copy->getValue());
    }

}
