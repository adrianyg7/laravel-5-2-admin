<?php

namespace App\Services;

class Flash
{
    /**
     * Create a flash-like message
     *
     * @param  string  $message
     * @param  string  $title
     * @param  string  $type
     * @param  string  $key
     * @return void
     */
    protected function create($message, $title, $type, $key)
    {
        session()->flash($key, compact('message', 'title', 'type'));
    }

    /**
     * Create an information flash-like message
     *
     * @param  string  $message
     * @param  string  $title
     * @return void
     */
    public function info($message, $title = 'Aviso')
    {
        return $this->create($message, $title, 'info', 'flash_message');
    }

    /**
     * Create a success flash-like message
     *
     * @param  string  $message
     * @param  string  $title
     * @return void
     */
    public function success($message, $title = '¡Éxito!')
    {
        return $this->create($message, $title, 'success', 'flash_message');
    }

    /**
     * Create a warning flash-like message
     *
     * @param  string  $message
     * @param  string  $title
     * @return void
     */
    public function warning($message, $title = '¡Atención!')
    {
        return $this->create($message, $title, 'warning', 'flash_message');
    }

    /**
     * Create an error flash-like message
     *
     * @param  string  $message
     * @param  string  $title
     * @return void
     */
    public function error($message, $title = '¡Error!')
    {
        return $this->create($message, $title, 'error', 'flash_message');
    }

    /**
     * Create an overlay flash-like message
     *
     * @param  string  $message
     * @param  string  $title
     * @param  string  $type
     * @param  string  $key
     * @return void
     */
    public function overlay($message, $title = 'Aviso', $type = 'info')
    {
        return $this->create($message, $title, $type, 'flash_message_overlay');
    }
}
