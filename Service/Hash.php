<?php

namespace Kitpages\UtilBundle\Service;

/**
 * @example
 * $hash = $tool->getHash($userId, $userName, $reference, array(toto));
 * if ($tool->checkHash($hash, $userId, $userName, $reference, array(toto)) ) {
 *     // do something
 * }
 */
class Hash
{
    /** @var null|string secret passphrase */
    protected $secret = null;

    /**
     * @param string $secret secret pass phrase used as salt for encoding
     */
    public function __construct(
        $secret
    )
    {
        $secret = preg_replace("/[^a-zA-Z0-9]/","x",$secret);
        $this->secret = $secret;
    }

    /**
     * return a hash for a list of params
     * @param mixed variable length param list
     */
    public function getHash()
    {
        $paramString = $this->getParamString(func_get_args());
        $encrypted = crypt($paramString, '$2a$07$'.$this->secret.'$');
        //echo "encrypted=$encrypted ; paramString=$paramString";
        return $encrypted;
    }

    /**
     * @param $hash
     * @param mixed variable length param list
     * @return bool
     */
    public function checkHash()
    {
        $args = func_get_args();
        $hash = array_shift($args);
        $paramString = $this->getParamString($args);
        if ( crypt($paramString, $hash) === $hash ) {
            return true;
        }
        return false;
    }

    protected function getParamString($args)
    {
        $paramList = array();
        foreach ($args as $arg) {
            if (!is_array($arg)) {
                $argTab = array($arg);
            }
            else {
                $argTab = $arg;
            }
            foreach ($argTab as $arg) {
                if (!$arg) {
                    $arg = "empty";
                }
                $arg = (string)$arg;
                $paramList[] = $arg;
            }
        }
        return implode("-", $paramList);
    }
}
