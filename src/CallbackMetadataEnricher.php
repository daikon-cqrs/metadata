<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Metadata;

use Closure;

final class CallbackMetadataEnricher implements MetadataEnricherInterface
{
    private Closure $callable;

    public function __construct(Closure $callable)
    {
        $this->callable = $callable;
    }

    public function enrich(MetadataInterface $metadata): MetadataInterface
    {
        return ($this->callable)($metadata);
    }
}
