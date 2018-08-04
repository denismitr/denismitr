<?php
/**
 * Created by PhpStorm.
 * User: denismitr
 * Date: 04.08.2018
 * Time: 21:07
 */

namespace App\Exceptions;


class AdminNotFound extends \Exception
{
    public static function noMatchingEmail(string $email): self
    {
        return new static("No matching email: <{$email}>");
    }

    public static function doesNotBelongToAdminGroup(string $email): self
    {
        return new static(
            "User with email <{$email}> exists in DB but does not belong to admins group."
        );
    }
}