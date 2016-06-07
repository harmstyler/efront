<?php

namespace eFront;

use eFront\Exception\BadRequestException;
use eFront\Exception\BranchException;
use eFront\Exception\JobException;
use SimpleXMLElement;

/**
 * Class Branch.
 */
class Branch extends eFront
{
    /**
     * Assigns a user to a branch. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and assigns the user to the branch.
     *
     * @link http://wiki.efrontlearning.net/XML_API2#User_to_Branch
     *
     * @param string $token          token to communicate with the XML API module
     * @param string $login          the login of the corresponding user
     * @param int    $branchId
     * @param int    $jobId          The job ID (must not be 0)
     * @param int    $positionId     The Position Id (0 for user, 1 for supervisor)
     * @param string $jobDescription
     *
     * @return SimpleXMLElement
     *
     * @throws Exception\ApiError
     * @throws Exception\ClientException
     */
    public function assignUserToBranch($token, $login, $branchId, $jobId, $positionId, $jobDescription)
    {
        if ($jobId === 0) {
            throw new JobException('Job ID must not be zero');
        }
        if ($positionId !== 0 && $positionId !== 1) {
            throw new BranchException('Position ID only allows 1 or 0');
        }
        $xml_response = $this->buildResponse($this->apiBase . '?action=user_to_branch' . '&token=' . $token . '&login=' . $login . '&job=' . $jobId . '&branch=' . $branchId . '&position=' . $positionId . '&job_description=' . $jobDescription);

        return $xml_response;
    }

    /**
     * Get all the available jobs of a branch. The module checks whether the provided token is valid and whether its status is logged. If so, it processes the request and all the available jobs of the corresponding branch.
     *
     * @link http://wiki.efrontlearning.net/XML_API2#Branch_Jobs
     *
     * @param $token
     * @param $login
     * @param int         $branchId
     * @param null|int    $jobId          The job ID (must not be 0)
     * @param null|int    $positionId     The Position Id (0 for user, 1 for supervisor)
     * @param null|string $jobDescription
     *
     * @return Exception\ApiError|string
     *
     * @throws BadRequestException
     * @throws Exception\ApiError
     * @throws Exception\ClientException
     */
    public function getBranchJobs($token, $login, $branchId, $jobId = null, $positionId = null, $jobDescription = null)
    {
        $requestUrl = $this->apiBase . '?action=branch_jobs' . '&token=' . $token . '&login=' . $login . '&branch=' . $branchId;

        if ($jobId !== null && is_int($jobId)) {
            if ($jobId === 0) {
                throw new JobException('Job ID must not be zero');
            }
            $requestUrl .= '&job=' . $jobId;
        }
        if ($positionId !== null && is_int($positionId)) {
            if ($positionId !== 0 && $positionId !== 1) {
                throw new BranchException('Position ID only allows 1 or 0');
            }
            $requestUrl .= '&position=' . $positionId;
        }
        if ($jobDescription !== null) {
            $requestUrl .= '&job_description=' . $jobDescription;
        }

        $xml_response = $this->buildResponse($requestUrl);

        return $xml_response;
    }
}
