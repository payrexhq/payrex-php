<?php

namespace Payrex;

class Payrex
{
  public static $caBundlePath = null;
  public static $verifySslCerts = true;

  public static function getCACertificateBundlePath()
  {
      return self::$caBundlePath ?: self::getDefaultCACertificateBundlePath();
  }

  public static function setCACertificateBundlePath($caBundlePath)
  {
      self::$caBundlePath = $caBundlePath;
  }

  private static function getDefaultCACertificateBundlePath()
  {
    return \realpath(__DIR__ . '/../data/cacert.crt');
  }

  public static function getVerifySslCerts()
  {
      return self::$verifySslCerts;
  }

  public static function setVerifySslCerts($verify)
  {
      self::$verifySslCerts = $verify;
  }
}