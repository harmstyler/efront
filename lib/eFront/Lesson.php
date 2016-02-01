<?php

namespace eFront;

use SimpleXMLElement;

/**
 * Class Lesson
 * @package eFront
 */
class Lesson extends eFront
{
    /**
     * Get lessons
     *
     * Request of lessons defined in platform. The application must provide its token. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and provides information about the lessons.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Lessons
     * @param string $token token to communicate with the XML API module
     * @return SimpleXMLElement Object information about the lessons
     */
    public function getLessons($token)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=lessons" . "&token=" . $token);
        return $xml_response;
    }

    /**
     * Lesson info
     *
     * Request of general information about a lesson. The application must provide its token and the id of the lesson. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and provides general information about the corresponding lesson
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Lesson_info
     * @param string $token token to communicate with the XML API module
     * @param int $lesson_id the lesson id of the corresponding lesson
     * @return SimpleXMLElement Object general information about a lesson
     */
    public function getInfo($token, $lesson_id)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=lesson_info" . "&token=" . $token . "&lesson=" . $lesson_id);
        return $xml_response;
    }

    /**
     * Create a new lesson
     *
     * Creation of a new lesson. The application must provide its token, the name of the lesson, the category (id) it will belong, a flag about if the lesson is available via course or directly, and lesson's language. Price of the lesson can also be defined (if it is directly availabe). The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and creates the lesson.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Create_a_new_lesson
     * @param string $token token to communicate with the XML API module
     * @param string $name the name of the corresponding new lesson
     * @param int $category the category id of the corresponding new lesson
     * @param bool $course_only a flag about if the lesson is available via course or directly
     * @param string $language the language of the corresponding new lesson
     * @param int $price the price of the corresponding new lesson
     * @return string
     */
    public function createLesson($token, $name, $category, $course_only, $language, $price)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=create_lesson" . "&token=" . $token . "&name=" . $name . "&category=" . $category . "&course_only=" . $course_only . "&language=" . $language . "&price=" . $price);
        return $xml_response->status;
    }

    /**
     * Assign lesson to user
     *
     * Assignment of a lesson to a user. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and assigns the corresponding lesson to the user with the corresponding role.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Assign_lesson_to_user
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @param int $lesson_id the lesson id of the corresponding lesson
     * @param string $type the corresponding role of the user in the lesson
     * @return string
     */
    public function assignToUser($token, $login, $lesson_id, $type)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=lesson_to_user" . "&token=" . $token . "&login=" . $login . "&lesson=" . $lesson_id . "&type=" . $type);
        return $xml_response->status;
    }

    /**
     * Remove a lesson from user
     *
     * De-assignment of a lesson to a user. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and deassigns the corresponding lesson with the user
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Remove_a_lesson_from_user
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @param int $lesson_id the lesson id of the corresponding lesson
     * @return string
     */
    public function removeFromUser($token, $login, $lesson_id)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=lesson_from_user" . "&token=" . $token . "&login=" . $login . "&lesson=" . $lesson_id);
        return $xml_response->status;
    }

    /**
     * Activate assignment for lesson to a user
     *
     * Activation of an assignment for a lesson to a user. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and completes the "pending" assignment for lesson to the user.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Activate_assignment_for_lesson_to_a_user
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @param int $lesson_id the lesson id of the corresponding lesson
     * @return string
     */
    public function activateToUser($token, $login, $lesson_id)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=activate_user_lesson" . "&token=" . $token . "&login=" . $login . "&lesson=" . $lesson_id);
        return $xml_response->status;
    }

    /**
     * Deactivate assignment for lesson to a user
     *
     * Deactivation of an assignment for a lesson to a user. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and deactivates the assignment for lesson to the user.
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Deactivate_assignment_for_lesson_to_a_user
     * @param string $token token to communicate with the XML API module
     * @param string $login the login of the corresponding user
     * @param int $lesson_id the lesson id of the corresponding lesson
     * @return string
     */
    public function deactivateFromUser($token, $login, $lesson_id)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=deactivate_user_lesson" . "&token=" . $token . "&login=" . $login . "&lesson=" . $lesson_id);
        return $xml_response->status;
    }

    /**
     * Buy a lesson
     *
     * Buy a lesson. The application must provide its token, a lesson id and a user login. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and provides a paypal url which the user (defined by the login) can be redirected to buy a lesson (defined by the lesson_id).
     *
     * @link http://docs.efrontlearning.net/index.php/XML_API2#Courses
     * @param string $token token to communicate with the XML API module
     * @param int $lesson_id the lesson id of the corresponding course
     * @param string $login the login of the corresponding user
     * @return SimpleXMLElement Object the paypal url to buy the corresponding course
     */
    public function buyLesson($token, $lesson_id, $login)
    {
        $xml_response = $this->buildResponse($this->apiBase . "?action=buy_lesson" . "&token=" . $token . "&lesson=" . $lesson_id . "&login=" . $login);
        return $xml_response->redirect_url;
    }
}
