<?php

/**
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 *
 * Copyright (c) 2015-2018 Yuuki Takezawa
 *
 */
return [

    'host' => env('FLUENTD_HOST', 'fluentd-service'),

    'port' => env('FLUENTD_PORT', 24224),

    /** @see https://github.com/fluent/fluent-logger-php/blob/master/src/FluentLogger.php */
    'options' => [],

    /** @see https://github.com/fluent/fluent-logger-php/blob/master/src/PackerInterface.php */
    // specified class name
    'packer' => null,

    // optionally override Ytake\LaravelFluent\FluentHandler class to customize behaviour
    'handler' => null,

    'tagFormat' => '{{channel}}.{{level_name}}',
];
