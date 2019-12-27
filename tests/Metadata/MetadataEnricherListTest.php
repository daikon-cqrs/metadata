<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Tests\Metadata;

use Daikon\Metadata\MetadataEnricherInterface;
use Daikon\Metadata\MetadataEnricherList;
use PHPUnit\Framework\TestCase;

final class MetadataEnricherListTest extends TestCase
{
    public function testPush(): void
    {
        $emptyList = new MetadataEnricherList;
        /** @var MetadataEnricherInterface $mockEnricher */
        $mockEnricher = $this->createMock(MetadataEnricherInterface::class);
        $enricherList = $emptyList->push($mockEnricher);
        $this->assertCount(1, $enricherList);
        $this->assertTrue($emptyList->isEmpty());
    }
}
