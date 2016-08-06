<?php 
namespace Core\Utils;

abstract class Config
{
    /**
     * Contains the filename and the key of the config file
     * with dot (.) seprator
     * @var array
     */
    private static $config = array();


    public static function get($configValue = '')
    {
        if(!empty($configValue)) {
            static::$config = explode('.', $configValue);
            $file = static::getConfigFile();
            $configItems = static::loadConfigFile($file);
            $key = static::getConfigKey();

            if(!$key) {
                trigger_error('Error: Config key is not set', E_USER_ERROR);
            } else if(!isset($configItems[$key]) || !array_key_exists($key, $configItems)) {
                trigger_error('Error: Undefined config key "' . $key . '" in ' . $file . '.php', E_USER_ERROR);
            } else {
                return $configItems[$key];
            }
        }

        return false;
    }


    /**
     * Get the filename of the configuration file]
     * @return string [return bool(false) if the index 0 is not set]
     */
    private static function getConfigFile()
    {
        return isset(static::$config[0]) ? static::$config[0] : false;
    }    


    /**
     * Get the key on the config file
     * @return string [return bool(false) if the index 1 is not set]
     */
    private static function getConfigKey()
    {
        return isset(static::$config[1]) ? static::$config[1] : false;
    }


    /**
     * Load the file of the config file
     * @param  [string] $file
     * @return [array]
     */
    private static function loadConfigFile($file)
    {
        if(!file_exists(APP_PATH . '/config/' . $file . '.php')) {
            throw new \Exception('Error: ' . $file . '.php' . ' doesn\'t exist');
            return;
        }

        return require APP_PATH . '/config/' . $file . '.php';
    }
}