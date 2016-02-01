<?php

namespace eFront;

use SimpleXMLElement;

/**
 * Class Group
 * @package eFront
 */
class Group extends eFront
{
    /**
     * Group info
     *
     * Another provided action is the request of info for a specific user group. The application must provide its token, and the group (id). The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and provides information about the corresponding user group.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Group_info
     * @param string $token token to communicate with the XML API module
     * @param int $group the group id of the corresponding group
     * @return SimpleXMLElement Object general information about a group
     * @throws ApiError
     */
    public function getInfo($token, $group)
    {
        $xml_response = simplexml_load_file($this->apiBase . "?action=group_info" . "&token=" . $token . "&group=" . $group);
        if ($xml_response->status == 'error') {
            throw new ApiError($xml_response->message);
        } else {
            return $xml_response;
        }
    }

    /**
     * Assign user to group
     *
     * Another provided action is the request of assigning a user to a group. The application must provide its token, and the group (id) and the login of the user. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request returning normally the 'ok' status.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Assign_user_to_group
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @param int $group the group id of the corresponding group
     * @return string|ApiError
     * @throws ApiError
     */
    public function assignUserToGroup($token, $login, $group)
    {
        $xml_response = simplexml_load_file($this->apiBase . "?action=group_to_user" . "&token=" . $token . "&login=" . $login . "&group=" . $group);
        if ($xml_response->status == 'error') {
            throw new ApiError($xml_response->message);
        } else {
            return $xml_response->status;
        }
    }

    /**
     * Remove a user from group
     *
     * Another provided action is the request of removing a user from a group. The application must provide its token, and the group (id) and the login of the user. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request returning normally the 'ok' status.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Assign_user_to_group
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @param int $group the group id of the corresponding group
     * @return string|ApiError
     * @throws ApiError
     */
    public function removeUserFromGroup($token, $login, $group)
    {
        $xml_response = simplexml_load_file($this->apiBase . "?action=group_from_user" . "&token=" . $token . "&login=" . $login . "&group=" . $group);
        if ($xml_response->status == 'error') {
            throw new ApiError($xml_response->message);
        } else {
            return $xml_response->status;
        }
    }
}
