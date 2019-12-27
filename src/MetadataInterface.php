<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Metadata;

use Countable;
use Daikon\Interop\FromNativeInterface;
use Daikon\Interop\ToNativeInterface;
use IteratorAggregate;
use Traversable;

interface MetadataInterface extends IteratorAggregate, Countable, FromNativeInterface, ToNativeInterface
{
    public static function makeEmpty(): MetadataInterface;

    public function equals(MetadataInterface $metadata): bool;

    public function has(string $key): bool;

    /** @param mixed $value */
    public function with(string $key, $value): MetadataInterface;

    public function without(string $key): MetadataInterface;

    /**
     * @param mixed $default
     * @return mixed
     */
    public function get(string $key, $default = null);

    public function isEmpty(): bool;

    public function getIterator(): Traversable;

    public function count(): int;
}
