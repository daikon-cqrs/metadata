<?php
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\Metadata;

interface MetadataEnricherInterface
{
    public function enrich(MetadataInterface $metadata): MetadataInterface;
}
