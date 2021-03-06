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

/**
 * Key for IDiscoveryCache entries.
 */
class DiscoveryCacheKey
{

    private $_selectedMCC;
    private $_selectedMNC;
    private $_identifiedMCC;
    private $_identifiedMNC;

    /**
     * DiscoveryCacheKey constructor.
     *
     * @param string $selectedMCC the selected mobile country code
     * @param string $selectedMNC the selected mobile network code
     * @param string $identifiedMCC the identified mobile country code
     * @param string $identifiedMNC the identified mobile network code
     */
    public function __construct($selectedMCC, $selectedMNC, $identifiedMCC = null, $identifiedMNC = null)
    {
        $this->_selectedMCC = $selectedMCC;
        $this->_selectedMNC = $selectedMNC;
        $this->_identifiedMCC = $identifiedMCC;
        $this->_identifiedMNC = $identifiedMNC;
    }

    /**
     * Create an instance of DiscoveryCacheKey
     *
     * @param string $mcc The MCC.
     * @param string $mnc The MNC.
     * @return DiscoveryCacheKey A DiscoveryCacheKey with the operator details.
     */
    public static function newWithDetails($mcc, $mnc)
    {
        if (null == $mcc || null == $mnc) {
            return null;
        }
        return new DiscoveryCacheKey($mcc, $mnc);
    }

    /**
     * Create an instance of DiscoveryCacheKey with the selected MCC and MNC
     * set.
     *
     * @param string $selectedMCC The selected MCC.
     * @param string $selectedMNC The selected MNC.
     * @return DiscoveryCacheKey|null with the details of the selected operator.
     */
    public static function newWithSelectedData($selectedMCC, $selectedMNC)
    {
        if (null == $selectedMCC || null == $selectedMNC) {
            return null;
        }

        return new DiscoveryCacheKey($selectedMCC, $selectedMNC, null, null);
    }

    /**
     * Create an instance of DiscoveryCacheKey with the identified MCC and MNC
     * set.
     *
     * @param string $identifiedMCC The identified MCC.
     * @param string $identifiedMNC The identified MNC.
     * @return DiscoveryCacheKey|null A DiscoveryCacheKey with the details of the identified operator.
     */
    public static function newWithIdentifiedData($identifiedMCC, $identifiedMNC)
    {
        if (null == $identifiedMCC || null == $identifiedMNC) {
            return null;
        }

        return new DiscoveryCacheKey(
            null, null, $identifiedMCC, $identifiedMNC
        );
    }

    /**
     * The selected MCC.
     *
     * @return string The selected MCC.
     */
    public function getSelectedMCC()
    {
        return $this->_selectedMCC;
    }

    /**
     * The selected MNC.
     *
     * @return string The selected MNC.
     */
    public function getSelectedMNC()
    {
        return $this->_selectedMNC;
    }

    /**
     * The identified MCC.
     *
     * @return string The identified MCC.
     */
    public function getIdentifiedMCC()
    {
        return $this->_identifiedMCC;
    }

    /**
     * The identified MNC.
     *
     * @return string The identified MNC.
     */
    public function getIdentifiedMNC()
    {
        return $this->_identifiedMNC;
    }

    /**
     * Combine the class variables to create a unique string for cache storage
     *
     * @return string The key used to store and retrieve cache values
     */
    public function getKey()
    {
        return preg_replace(
            '/[^a-zA-Z0-9_]/', '', implode('_', get_object_vars($this))
        );
    }

}
