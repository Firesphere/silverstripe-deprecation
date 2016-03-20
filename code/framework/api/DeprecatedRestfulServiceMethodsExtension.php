<?php

/**
 * Created by IntelliJ IDEA.
 * User: simon
 * Date: 20/03/16
 * Time: 15:56
 */
class DeprecatedRestfulServiceMethodsExtension extends DataExtension
{

    /**
     * @deprecated since version 4.0
     */
    protected function constructURL(){
        Deprecation::notice('4.0', 'constructURL is deprecated, please use `getAbsoluteRequestURL` instead');
        return Controller::join_links($this->owner->baseURL, '?' . $this->owner->queryString);
    }

    /**
     * @param string
     * @deprecated since version 4.0
     */
    public function setCachedBody($content) {
        Deprecation::notice('4.0', 'Setting the response body is now deprecated, set the cached request instead');
        if (!$this->owner->cachedResponse) {
            $this->owner->cachedResponse = new RestfulService_Response($content);
        }
        else {
            $this->owner->cachedResponse->setBody($content);
        }
    }

    /**
     * set a curl option that will be applied to all requests as default
     * {@see http://php.net/manual/en/function.curl-setopt.php#refsect1-function.curl-setopt-parameters}
     *
     * @deprecated 4.0 Use the "RestfulService.default_curl_options" config setting instead
     * @param int $option The cURL opt Constant
     * @param mixed $value The cURL opt value
     */
    public static function set_default_curl_option($option, $value) {
        Deprecation::notice('4.0', 'Use the "RestfulService.default_curl_options" config setting instead');
        Config::inst()->update('RestfulService', 'default_curl_options', array($option => $value));
    }

    /**
     * set many defauly curl options at once
     *
     * @deprecated 4.0 Use the "RestfulService.default_curl_options" config setting instead
     */
    public static function set_default_curl_options($optionArray) {
        Deprecation::notice('4.0', 'Use the "RestfulService.default_curl_options" config setting instead');
        Config::inst()->update('RestfulService', 'default_curl_options', $optionArray);
    }

    /**
     * Sets default proxy settings for outbound RestfulService connections
     *
     * @param string $proxy The URL of the proxy to use.
     * @param int $port Proxy port
     * @param string $user The proxy auth user name
     * @param string $password The proxy auth password
     * @param boolean $socks Set true to use socks5 proxy instead of http
     * @deprecated 4.0 Use the "RestfulService.default_curl_options" config setting instead,
     *             with direct reference to the CURL_* options
     */
    public static function set_default_proxy($proxy, $port = 80, $user = "", $password = "", $socks = false) {
        Deprecation::notice(
            '4.0',
            'Use the "RestfulService.default_curl_options" config setting instead, '
            . 'with direct reference to the CURL_* options'
        );
        config::inst()->update('RestfulService', 'default_proxy', array(
            CURLOPT_PROXY => $proxy,
            CURLOPT_PROXYUSERPWD => "{$user}:{$password}",
            CURLOPT_PROXYPORT => $port,
            CURLOPT_PROXYTYPE => ($socks ? CURLPROXY_SOCKS5 : CURLPROXY_HTTP)
        ));
    }

}