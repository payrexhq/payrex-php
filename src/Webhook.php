<?php

namespace Payrex;

class Webhook
{
    public static function parseEvent($payload, $signatureHeader, $webhookSecretKey)
    {
        if (!is_string($signatureHeader)) {
            throw new \Payrex\Exceptions\UnexpectedValueException('Signature must be a string.');
        }

        $event = \Payrex\Event::parse($payload);

        $arrSignature = explode(',', $signatureHeader);

        if (self::checkIfValidSignature($arrSignature)) {
            throw new \Payrex\Exceptions\UnexpectedValueException("The format of signature {$signatureHeader} is invalid.");
        }

        if (self::checkIfSignatureMatched($payload, $webhookSecretKey, $arrSignature)) {
            throw new \Payrex\Exceptions\SignatureVerificationException("The signature is invalid.");
        }

        return $event;
    }

    private static function checkIfSignatureMatched($payload, $webhookSecretKey, $arrSignature)
    {
        $timestamp = explode('=', $arrSignature[0])[1];
        $testModeSignature = explode('=', $arrSignature[1])[1];
        $liveModeSignature = explode('=', $arrSignature[2])[1];

        if (!empty($testModeSignature)) {
            $actualSignature = $testModeSignature;
        }

        if (!empty($liveModeSignature)) {
            $actualSignature = $liveModeSignature;
        }

        $expectedSignature = hash_hmac('sha256', $timestamp . '.' . $payload, $webhookSecretKey);

        return $expectedSignature != $actualSignature;
    }

    private static function checkIfValidSignature($arrSignature)
    {
        return $arrSignature === false || count($arrSignature) < 3;
    }
}
