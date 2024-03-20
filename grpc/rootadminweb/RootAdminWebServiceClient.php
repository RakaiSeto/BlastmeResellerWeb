<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Rootadminweb;

/**
 */
class RootAdminWebServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Rootadminweb\DoLoginRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DoLogin(\Rootadminweb\DoLoginRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/rootadminweb.RootAdminWebService/DoLogin',
        $argument,
        ['\Rootadminweb\DoLoginResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Rootadminweb\DoLogoutRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\UnaryCall
     */
    public function DoLogout(\Rootadminweb\DoLogoutRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/rootadminweb.RootAdminWebService/DoLogout',
        $argument,
        ['\Rootadminweb\DoLogoutResponse', 'decode'],
        $metadata, $options);
    }

}
