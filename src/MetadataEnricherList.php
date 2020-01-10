<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Metadata;

use Daikon\DataStructure\TypedListInterface;
use Daikon\DataStructure\TypedListTrait;

final class MetadataEnricherList implements TypedListInterface
{
    use TypedListTrait;

    public function __construct(iterable $enrichers = [])
    {
        $this->init($enrichers, [MetadataEnricherInterface::class]);
    }

    public function prependEnricher(string $namespace, string $value): self
    {
        return $this->unshift(
            new CallbackMetadataEnricher(
                function (MetadataInterface $metadata) use ($namespace, $value): MetadataInterface {
                    return $metadata->with($namespace, $value);
                }
            )
        );
    }
}
