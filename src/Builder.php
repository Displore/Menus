<?php

namespace Displore\Menus;

use Displore\Menus\Contracts\MenuBuilder;

class Builder implements MenuBuilder
{
    /**
     * All of the menus.
     * @var array
     */
    protected $stack;

    /**
     * Get a menu based on its name.
     * 
     * @param  string $name
     * @return mixed
     */
    public function get($name)
    {
        if (isset($this->stack[$name])) {
            return $this->stack[$name];
        }
        throw new \Exception("Menu {$name} not found");
    }

    /**
     * Add a menu to the stack.
     * 
     * @param  string $name
     * @param  mixed  $menu
     * @return $this
     */
    public function add($name, $menu)
    {
        $this->stack[$name] = $menu;

        return $this;
    }

    /**
     * Turn a menu into HTML.
     * @param  string $name
     * @return string
     */
    public function build($name)
    {
        if (isset($this->stack[$name])) {
            return implode(' ', $this->stack[$name]);
        }
        throw new \Exception("Menu {$name} not found");
    }

    /**
     * Populate the stack from an array of menus.
     * @param  array $config
     * @return $this
     */
    public function from(array $config)
    {
        foreach ($config as $name => $menu) {
            $this->stack[$name] = $menu;
        }

        return $this;
    }
}
