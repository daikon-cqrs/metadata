<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Tests\Metadata;

use Daikon\Metadata\CallbackMetadataEnricher;
use Daikon\Metadata\Metadata;
use PHPUnit\Framework\TestCase;

final class CallbackMetadataEnricherTest extends TestCase
{
    public function testEnrich(): void
    {
        $metadata = (new CallbackMetadataEnricher(function (Metadata $metadata) {
            return $metadata->with('message', 'hello world');
        }))->enrich(Metadata::makeEmpty());
        $this->assertEquals($metadata->get('message'), 'hello world');
    }
}
