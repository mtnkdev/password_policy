<?php
/**
 * ownCloud - password
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Patrick Paysant / CNRS <ppaysant@linagora.com>
 * @copyright Patrick Paysant / CNRS 2016
 */

namespace OCA\PasswordPolicyEnforcement\Hooks;

class Hooks {

    /**
     * Verify password conformance to set policy
     * @param  \OC\User\User $user
     * @param  string        $password
     * @param  string        $recoverPassword
     * @return boolean
     */
    public static function preSetPassword(\OC\User\User $user, string $password, $recoverPassword = "")
    {
        $policy = new \OCA\PasswordPolicyEnforcement\Policy;
        if(!$policy->testPassword($password)) {
            //throw(new \Exception("Password does not comply with the Password Policy."));
            throw(new \OC\HintException("Password does not comply with the Password Policy.", "Please see password policy."));
        }
        else {
            return true;
        }
    }
}
