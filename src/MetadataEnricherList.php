<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Metadata;

use Daikon\DataStructure\TypedList;

final class MetadataEnricherList extends TypedList
{
    public function __construct(iterable $enrichers = [])
    {
        $this->init($enrichers, [MetadataEnricherInterface::class]);
    }

    public function enrichWith(string $key, string $value): self
    {
        return $this->unshift(
            new CallbackMetadataEnricher(
                fn(MetadataInterface $metadata): MetadataInterface => $metadata->with($key, $value)
            )
        );
    }
}
