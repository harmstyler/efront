<?php

namespace eFront\Exception;

/**
 * Class ExceptionFactory
 * @package eFront\Exception
 */
class ExceptionFactory
{
    /**
     * ExceptionFactory constructor.
     * @param string $errorMessage
     * @return ApiError New Exception Object
     */
    public static function make($errorMessage)
    {
        switch ($errorMessage) {
            case "Invalid token":
                return new InvalidTokenException($errorMessage);
            case "Incomplete arguments":
            case "Invalid parameter":
            case "Invalid login format":
            case "No username/password/token provided":
                return new BadRequestException($errorMessage);
            case "Invalid password":
                return new InvalidPasswordException($errorMessage);
            case "You have already logged in":
                return new AlreadyLoggedInException($errorMessage);
            case "Invalid username":
            case "User does not exist";
            case "This user does not exist":
                return new UserNotFoundException($errorMessage);
            case "You must have an administrator account to login to eFront API":
            case "User can not logout":
                return new ForbiddenException($errorMessage);
            case "Some problem occured":
            case "Unable to update log":
            case "Other":
                return new ClientException($errorMessage);
            case "User already exists":
                return new UserExistsException($errorMessage);
            case "Maximum number of users reached":
                return new MaxUsersException($errorMessage);
            case "Invalid language":
                return new InvalidLanguageException($errorMessage);
            case "Invalid job id":
            case "Invalid job description":
                return new JobException($errorMessage);
            case "This branch does not exist":
            case "Invalid branch id":
            case "Invalid position":
                return new BranchException($errorMessage);
            case "Invalid category":
            case "Category does not exit":
                return new CategoryException($errorMessage);
            case "Invalid lesson id":
            case "Assignment already exists":
            case "Assignment does not exist":
            case "Lesson doesn't exist":
                return new LessonException($errorMessage);
            case "Group doesn't exist":
            case "Invalid group id":
            case "User is not assigned to group":
                return new GroupException($errorMessage);
            case "Invalid course id":
            case "Course doesn't exist":
            case "User not enrolled into course":
                return new CourseException($errorMessage);
            case "Invalid curriculum id":
            case "A curriculum's course is empty":
                return new CurriculumException($errorMessage);
            case "User is not logged in":
                return new NotLoggedInException($errorMessage);
            case "Autologin key already set":
                return new AutologinExistsException($errorMessage);
            default:
                return new ApiError($errorMessage);
        }
    }
}
