<?php

namespace BorrowWorks\MessageBus\Interop\Handler;

use BorrowWorks\MessageBus\Interop\Delegate\AbstractTransportDelegate;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Handler that dispatches the delegated message to the current instance of the message bus.
 */
class TransportDelegateHandler implements MessageHandlerInterface
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function __invoke(AbstractTransportDelegate $delegate)
    {
        $this->messageBus->dispatch($delegate->getMessage());
    }
}
