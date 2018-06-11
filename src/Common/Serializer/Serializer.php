<?php

namespace WebPapers\Amazon\Common\Serializer;

use WebPapers\Amazon\Common\RequestInterface;

class Serializer implements SerializerInterface
{
    function serialize(RequestInterface $request)
    {
        return $request;
    }

    function unserialize($response)
    {
        return $response;
    }

    protected function serializeProperties($action, RequestInterface $request)
    {
        $parameters = array_merge(['Action' => $action], $this->flatten($request));

        return $parameters;
    }

    protected function flatten($object, $path = null)
    {
        $flattened = [];
        $metadata  = $object->getMetadata();

        foreach ($metadata as $prop => $meta) {
            if (!property_exists($object, $prop)) {
                continue;
            }

            $key   = ltrim($path.'.'.$prop, '.');
            $value = $object->{$prop};

            if (empty($value) && !is_bool($value)) {
                continue;
            }

            switch ($meta['type']) {
                case 'array':
                    if (!is_array($value)) {
                        $value = [$value];
                    }

                    $defaults = ['namespace' => 'member', 'subtype' => ''];
                    $meta = array_merge($defaults, $meta);
                    $idx  = 1;

                    foreach ($value as $i) {
                        if (is_a($i, $meta['subtype'])) {
                            $idxPath   = sprintf('%s.%s.%s', $key, $meta['namespace'], $idx);
                            $flattened = array_merge($flattened, $this->flatten($i, $idxPath));
                            ++$idx;
                        }
                    }
                    break;

                case 'boolean':
                    if (is_bool($value)) {
                        $flattened[$key] = $value? 'true' : 'false';
                    }
                    elseif ('true' == strtolower($value)) {
                        $flattened[$key] = 'true';
                    }
                    elseif ('false' == strtolower($value)) {
                        $flattened[$key] = 'false';
                    }
                    break;

                case 'choice':
                    $defaults = ['choices' => [], 'multiple' => false, 'namespace' => 'Id'];
                    $meta     = array_merge($defaults, $meta);
                    $validate = !empty($meta['choices']);

                    if (false === $meta['multiple']) {
                        if ($validate && !in_array($value, $meta['choices'])) {
                            continue;
                        }

                        if (is_array($value)) {
                            $value = array_shift($value);
                        }

                        $flattened[$key] = $value;
                    } else {
                        $value = array_values((array) $value);
                        $idx  = 1;

                        foreach ($value as $i) {
                            if ($validate && !in_array($i, $meta['choices'])) {
                                continue;
                            }

                            $idxPath = sprintf('%s.%s.%s', $key, $meta['namespace'], $idx);
                            $flattened[$idxPath] = $i;
                            ++$idx;
                        }
                    }
                    break;

                case 'date':
                case 'datetime':
                    $defaults = ['format' => static::DATE_FORMAT];
                    $meta     = array_merge($defaults, $meta);
                    if ('date' == $meta['type']) {
                        $meta['format'] = 'Y-m-d';
                    }

                    if ($value instanceof DateTimeInterface) {
                        $flattened[$key] = $value->format($meta['format']);
                    }
                    elseif (is_scalar($value) && false !== ($ts = strtotime($value))) {
                        $flattened[$key] = gmdate($meta['format'], $ts);
                    }
                    break;

                case 'object':
                    if (class_exists($meta['subtype']) && is_a($value, $meta['subtype'])) {
                        $flattened = array_merge($flattened, $this->flatten($value, $key));
                    }
                    break;

                case 'range':
                    $defaults = ['min' => 1, 'max' => 10];
                    $meta  = array_merge($defaults, $meta);
                    $value = intval($value);
                    $meta['min'] = intval($meta['min']);
                    $meta['max'] = intval($meta['max']);

                    if ($value >= $meta['min'] && $value <= $meta['max']) {
                        $flattened[$key] = $value;
                    }
                    break;

                case 'scalar':
                    if (is_scalar($value)) {
                        $flattened[$key] = $value;
                    }
                    break;

                default:
                    break;
            }
        }

        return $flattened;
    }
}