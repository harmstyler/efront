<?php

namespace eFront;

use SimpleXMLElement;

/**
 * Class Category
 * @package eFront
 */
class Category extends eFront
{
    /**
     * Get Categories
     *
     * Request all categories. The application must provide its token. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and provides information about the categories.
     *
     * @link
     * @param string $token token to communicate with the XML API module
     * @return SimpleXMLElement Object general information about a category
     */
    public function getCategories($token)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=categories" . "&token=" . $token);
        return $xml_response;
    }

    /**
     * Get Category
     *
     * Request of info for a specific category. The application must provide its token, and the category (id). The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and provides information about the corresponding category.
     *
     * @link
     * @param string $token token to communicate with the XML API module
     * @param int $category_id the category id of the corresponding category
     * @return SimpleXMLElement Object general information about a category
     */
    public function getCategory($token, $category_id)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=category" . "&token=" . $token . "&category=" . $category_id);
        return $xml_response;
    }
}
