<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: rootadminweb/rootadminweb.proto

namespace Rootadminweb;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>rootadminweb.DoLogoutResponse</code>
 */
class DoLogoutResponse extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string statuscode = 1;</code>
     */
    protected $statuscode = '';
    /**
     * Generated from protobuf field <code>string description = 2;</code>
     */
    protected $description = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $statuscode
     *     @type string $description
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Rootadminweb\Rootadminweb::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string statuscode = 1;</code>
     * @return string
     */
    public function getStatuscode()
    {
        return $this->statuscode;
    }

    /**
     * Generated from protobuf field <code>string statuscode = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setStatuscode($var)
    {
        GPBUtil::checkString($var, True);
        $this->statuscode = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string description = 2;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Generated from protobuf field <code>string description = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

}

