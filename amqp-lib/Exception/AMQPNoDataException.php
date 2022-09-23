<?php

namespace Kiri\AmqpLib\Exception;

/**
 * Used mostly in non-blocking methods when no data is ready for processing.
 */
class AMQPNoDataException extends AMQPRuntimeException
{
}
