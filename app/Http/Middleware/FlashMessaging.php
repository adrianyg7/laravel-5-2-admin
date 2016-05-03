<?php

namespace App\Http\Middleware;

use Closure;
use JavaScript;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class FlashMessaging
{
    /**
     * The session used by the flash messager.
     *
     * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
     */
    protected $session;

    /**
     * The keys used by the flash messager
     *
     * @var array
     */
    protected $keys = [
        'flash_message',
        'flash_message_overlay',
    ];

    /**
     * Constructor
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($key = $this->getSessionValidKey()) {
            JavaScript::put([$key => $this->session->get($key)]);
        }

        return $next($request);
    }

    /**
     * Gets the first valid key in session, returns null otherwise.
     *
     * @return mixed
     */
    protected function getSessionValidKey()
    {
        foreach ($this->keys as $key) {
            if ($this->session->has($key)) {
                return $key;
            }
        }

        return null;
    }
}
