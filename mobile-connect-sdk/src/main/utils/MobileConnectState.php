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

use MCSDK\discovery\DiscoveryResponse;

/**
 * Class used by application code to hold state between calls to the SDK.
 */
class MobileConnectState
{

    private $_encryptedMSISDN;
    private $_discoveryResponse;
    private $_state;
    private $_nonce;

    /**
     * Basic constructor allowing all properties to be set.
     *
     * @param DiscoveryResponse $discoveryResponse A discovery response.
     * @param string $encryptedMSISDN An encrypted MSISDN.
     * @param string $state A state value,
     * @param string $nonce A nonce value.
     */
    public function __construct(DiscoveryResponse $discoveryResponse, $encryptedMSISDN, $state, $nonce)
    {
        $this->_discoveryResponse = $discoveryResponse;
        $this->_encryptedMSISDN = $encryptedMSISDN;
        $this->_state = $state;
        $this->_nonce = $nonce;
    }

    /**
     * Construct a MobileConnectState with the Discovery Response and encrypted MSISDN properties initialised.
     *
     * @param DiscoveryResponse $discoveryResponse A Discovery Response.
     * @param string $encryptedMSISDN An encrypted MSISDN.
     * @return MobileConnectState A MobileConnectState.
     */
    static public function withDiscoveryResponseAndEncryptedMSISDN(DiscoveryResponse $discoveryResponse, $encryptedMSISDN)
    {

        return new MobileConnectState($discoveryResponse, $encryptedMSISDN, null, null);
    }

    /**
     * Merge the current state instance and the state and nonce into a new MobileConnectState instance.
     *
     * @param MobileConnectState $currentState An instance used as the basis of the new MobileConnectState instance.
     * @param string $state The state value of the new MobileConnectState instance.
     * @param string $nonce The nonce value of the new MobileConnectState instance.
     * @return MobileConnectState A new MobileConnectState instance.
     */
    static public function mergeStateAndNonce($currentState, $state, $nonce)
    {

        return new MobileConnectState($currentState->getDiscoveryResponse(), $currentState->getEncryptedMSISDN(), $state, $nonce);
    }

    /**
     * A Discovery Response obtained from {@link com.gsma.mobileconnect.discovery.IDiscovery}
     *
     * @return DiscoveryResponse A Discovery Response
     */
    public function getDiscoveryResponse()
    {
        return $this->_discoveryResponse;
    }

    /**
     * The encrypted MSISDN,
     *
     * Optional.
     *
     * This is also known as the subscriber_id.
     *
     * @return string The encrypted MSISDN.
     */
    public function getEncryptedMSISDN()
    {
        return $this->_encryptedMSISDN;
    }

    /**
     * A state value used in authorization.
     *
     * @return string The state value.
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * A nonce value used in authorization.
     *
     * @return string The nonce value.
     */
    public function getNonce()
    {
        return $this->_nonce;
    }

}
