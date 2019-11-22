<?php namespace CodesPhp\Support;

class Attrs
{
    /**
     * @var array
     */
    protected $array = [];

    /**
     * Constructor.
     * 
     * @param array
     */
    public function __construct($array = [])
    {
        $this->array = $array;        
    }

    /**
     * Get key attribute.
     * 
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        $return = Arr::get($this->array, $key, $default);

        if (is_array($return)) {
            $return = new Attrs($return);
        }

        return $return;
    }

    /**
     * Set key attribute.
     * 
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        Arr::set($this->array, $key, $value);
    }

    /**
     * Exist attribute key.
     * 
     * @param string $key
     * @return bool
     */
    public function exists($key)
    {
        return Arr::exists($this->array, $key);
    }

    /**
     * Magic get attribute.
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * Magic set attribute.
     */
    public function __set($name, $value)
    {
        $this->set($name, $value);
    }

    /**
     * Magic exists attribute.
     */
    public function __isset($name)
    {
        return $this->exists($name);
    }
}