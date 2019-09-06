<?php
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\Metadata;

final class CallbackMetadataEnricher implements MetadataEnricherInterface
{
    /** @var callable */
    private $callable;

    public function __construct(callable $callable)
    {
        $this->callable = $callable;
    }

    public function enrich(MetadataInterface $metadata): MetadataInterface
    {
        return call_user_func($this->callable, $metadata);
    }
}
