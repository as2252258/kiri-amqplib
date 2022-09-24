<?php

namespace Kiri\AmqpLib;

enum AMQPEnum
{
    case DIRECT;
    case FANOUT;
    case TOPIC;

}
