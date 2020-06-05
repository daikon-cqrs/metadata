<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Metadata;

use Daikon\DataStructure\Map;

final class Metadata extends Map implements MetadataInterface
{
    private function __construct(iterable $metadata = [])
    {
        $this->init($metadata);
    }

    public static function makeEmpty(): self
    {
        return new self;
    }

    public function toNative(): array
    {
        return $this->unwrap();
    }

    /** @param array $state */
    public static function fromNative($state): self
    {
        return new self($state);
    }
}
