<?php

namespace Kiri\AmqpLib;

use Kiri\Abstracts\Config;
use Kiri\Abstracts\Providers;
use Kiri\Di\ContainerInterface;
use Kiri\Di\LocalService;
use Kiri\Exception\ConfigException;
use Kiri\Server\Abstracts\AsyncServer;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;


/**
 *
 */
class AmqbLibProviders extends Providers
{


    /**
     * @param ContainerInterface $container
     * @param AsyncServer $manager
     * @param array $config
     * @throws \Exception
     */
    public function __construct(public ContainerInterface $container,
                                public AsyncServer        $manager, array $config = [])
    {
        parent::__construct($container, $config);
    }


    /**
     * @param LocalService $application
     * @return void
     * @throws ConfigException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function onImport(LocalService $application): void
    {
        $consumers = Config::get('amqp');
        foreach ($consumers['consumers'] as $consumer) {
            $class = new AmqbChannelProcess($consumers['host'], $consumers['port'], $consumers['user'],
                $consumers['password'], $consumers['vhost'] ?? '/', $consumer);
            $this->manager->addProcess($class);
        }

        $localService = $this->container->get(LocalService::class);
        /** @var AmpqProducer $producer */
        foreach ($consumers['producers'] as $key => $producer) {
            $localService->set($key, $producer);
        }
    }
}
