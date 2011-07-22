<?php
namespace Kitpages\UtilBundle\Service;



class Util {
    
    /**
     * Create a directory and all subdirectories needed.
     * @param string $pathname
     * @param octal $mode example 0666
     */
    public static function mkdirr($pathname, $mode = null)
    {
        // Check if directory already exists
        if (is_dir($pathname) || empty($pathname)) {
            return true;
        }
        // Ensure a file does not already exist with the same name
        if (is_file($pathname)) {
            return false;
        }
        // Crawl up the directory tree
        $nextPathname = substr($pathname, 0, strrpos($pathname, "/"));
        if (self::mkdirr($nextPathname, $mode)) {
            if (!file_exists($pathname)) {
                if (is_null($mode)) {
                    return mkdir($pathname);
                } else {
                    return mkdir($pathname, $mode);
                }
            }
        } else {
            throw new Exception (
                "intermediate mkdirr $nextPathname failed"
            );
        }
        return false;
    }
    
}

?>
