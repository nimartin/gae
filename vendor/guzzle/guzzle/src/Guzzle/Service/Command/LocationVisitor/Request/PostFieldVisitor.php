<?php

namespace Guzzle\Service\Command\LocationVisitor\Request;

use Guzzle\Http\Message\RequestInterface;
use Guzzle\Service\Command\CommandInterface;
use Guzzle\Service\Description\Parameter;

/**
 * Visitor used to apply a parameter to a POST field
 */
class PostFieldVisitor extends AbstractRequestVisitor
{
    /**
     * {@inheritdoc}
     */
    public function visit(CommandInterface $command, RequestInterface $request, Parameter $param, $value)
    {
        $request->setPostField(
            $param->getWireName(),
            $param && is_array($value) ? $this->resolveRecursively($value, $param) : $value
        );
    }
}
