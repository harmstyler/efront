<?php

namespace eFront;

use SimpleXMLElement;

/**
 * Class eFront
 * @package eFront
 */
class eFront
{
    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $apiBase;

    /**
     * Set domain
     *
     * Initialize library with an eFront domain
     *
     * @param string $domain eFront domain
     */
    public function setDomain($domain)
    {
        $domain = trim($domain, "/");
        $domain = str_replace(['http://', 'https://'], '', $domain);

        $this->domain = 'http://' . $domain;
        $this->apiBase = $this->domain . '/api2.php';
    }

    /**
     * Token Request
     *
     * For a third-party application to use the XML API module, is necessary to identify itself and log into the system. For security reasons, the XML API module utilizes a token approach. Whenever an application wants to communicate with the XML API module, it requests a token from the module. This token will be utilized through all the following requests, until it expires after 30minutes or the application explicitly logs out of the module. The generated tokens have a length of 30-chars and are stored along with their status (unlogged,logged) in the system's database.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Token_Request
     * @return string
     */
    public function requestToken()
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=token");
        return $xml_response->token;
    }

    /**
     * @param string $uri
     * @return string|ApiError
     * @throws ApiError
     */
    protected function buildResponse($uri)
    {
        $xml_response = simplexml_load_file($uri);
        if ($xml_response->status == 'error') {
            throw new ApiError($xml_response->message);
        } else {
            return $xml_response;
        }
    }

    /**
     * Log-in into the module (API)
     *
     * For a third-party application to log-in into the XML API module, it is necessary to provide its token, and administrator's account login and password. The module checks the passed arguments and if they are correct, it responses a corresponding status, otherwise it responses the error description. In the case of correct log-in, the module updates the token's status to logged.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Log-in_into_the_module_(API)
     * @param string $token token to communicate with the XML API module
     * @param string $username the username of the corresponding user
     * @param string $password the password of the corresponding user
     * @return string
     */
    public function loginModule($token, $username, $password)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=login" . "&token=" . $token . "&username=" . urlencode($username) . "&password=" . urlencode($password));
        return $xml_response->status;
    }

    /**
     * Log-in into platform (eFront)
     *
     * In order to log-in into eFront via API, it is necessary to provide the token and the login of the account you want to login into platform. The module checks if the login exists and logs user into eFront, returning also a corresponding status. Otherwise it responses the error description.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Log-in_into_platform_(eFront)
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @return string
     */
    public function login($token, $login)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=efrontlogin" . "&token=" . $token . "&login=" . $login);
        return $xml_response->status;
    }

    /**
     * @param $token
     * @param $login
     * @param $password
     * @return SimpleXMLElement[]
     */
    public function checkPassword($token, $login, $password)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=checkpassword" . "&token=" . $token . "&login=" . $login . "&password=" . $password);
        return $xml_response->status;
    }


    /**
     * Logout from platform (eFront)
     *
     * In order to logout from eFront via API, it is necessary to provide the token and the login of the account you want to logout. The module checks if the login exists and logs out the user.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Log-in_into_platform_(eFront)
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @return string
     */
    public function logout($token, $login)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=efrontlogout" . "&token=" . $token . "&login=" . $login);
        return $xml_response->status;
    }

    /**
     * Logout from platform (eFront)
     *
     * In order to logout from eFront via API, it is necessary to provide the token and the login of the account you want to logout. The module checks if the login exists and logs out the user.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Logout_from_module_(API)
     * @param string $token token to communicate with the XML API module
     * @return string
     */
    public function logoutModule($token)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=logout" . "&token=" . $token);
        return $xml_response->status;
    }

    /**
     * Catalog
     *
     * Request of catalog (courses and lessons) defined in platform. The application must provide its token. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and provides information about the catalog.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Catalog
     * @param string $token token to communicate with the XML API module
     * @return SimpleXMLElement Object
     */
    public function catalog($token)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=catalog" . "&token=" . $token);
        return $xml_response->status;
    }

    /**
     * @param $token
     * @return SimpleXMLElement
     */
    public function languages($token)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=languages" . "&token=" . $token);
        return $xml_response;
    }
}
