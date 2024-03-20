<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Test;

/**
 */
class HelloWorldServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Test\EmptyRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DoHelloWorld(\Test\EmptyRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/test.HelloWorldService/DoHelloWorld',
        $argument,
        ['\Test\HelloWorldResponse', 'decode'],
        $metadata, $options);
    }

}
