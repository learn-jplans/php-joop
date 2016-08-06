<?php 
namespace Core\Components;

abstract class Session
{
    
    /**
     * Start the session
     * @return void
     */
    public static function start()
    {
        session_start();
    }


    /**
     * Create or update session variable
     * @param [string] $key   [description]
     * @param [object] $value [description]
     * @return  void
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    /**
     * Get the value of the session variable
     * @param  [string] $key session name
     * @return [object]
     */
    public static function get($key)
    {
        return $_SESSION[$key];
    }


    /**
     * destroy the session
     * @return void
     */
    public static function destroy()
    {
        session_destroy();
    }
}