# Symfony Messenger Queue Interop
A very simple library that allows you to easily dispatch messages to different transports, providing
interoperability of messages.

## Requirements
- PHP 7.4+
- symfony/messenger 5.x or 6.x

## Usage

Create a new `TransportDelegate` to reflect the messenger transport you wish to use

```php
<?php

namespace App\MessageBus\Delegate;

use BorrowWorks\MessageBus\Interop\Delegate\AbstractTransportDelegate;

class AsyncTransportDelegate extends AbstractTransportDelegate
{
    public function __construct(object $message)
    {
        parent::__construct($message);
    }
}
```

Register your delegate as a messenger route that associates with the transport:
```
framework:
    messenger:
        transports:
            async: 'dsn://'

        routing:
            'App\MessageBus\Delegate\AsyncTransportDelegate': async
```

Dispatch your message by wrapping it with the delegate:
```php
$messageBus->dispatch(new AsyncTransportDelegate($myMessage));
```

