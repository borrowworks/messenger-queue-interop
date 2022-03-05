<?php

namespace BorrowWorks\MessageBus\Interop\Delegate;

/**
 * Wrapper for message bus messages that allow delegation to other transports/queues without the need of
 * multiple buses.
 *
 * Usage:
 * Create a new class that extends this, and register it in your symfony/messenger routes and point it to the transport
 * that you wish to delegate the message to.
 *
 * $messageBus->dispatch(new XTransportDelegate($myCommand));
 */
abstract class AbstractTransportDelegate
{
    private object $message;

    public function __construct(object $message) {
        $this->message = $message;
    }

    public function getMessage(): object
    {
        return $this->message;
    }
}
