<?php
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\Metadata;

use Daikon\Interop\FromNativeInterface;
use Daikon\Interop\ToNativeInterface;

interface MetadataInterface extends \IteratorAggregate, \Countable, FromNativeInterface, ToNativeInterface
{
    public static function makeEmpty(): MetadataInterface;

    public function equals(MetadataInterface $metadata): bool;

    public function has(string $key): bool;

    public function with(string $key, $value): MetadataInterface;

    public function without(string $key): MetadataInterface;

    public function get(string $key, $default = null);

    public function isEmpty(): bool;

    public function getIterator(): \Traversable;

    public function count(): int;

    public function __get(string $key);
}
