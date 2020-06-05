<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Tests\Metadata;

use Daikon\Metadata\Metadata;
use Daikon\Metadata\MetadataEnricherInterface;
use Daikon\Metadata\MetadataEnricherList;
use PHPUnit\Framework\TestCase;

final class MetadataEnricherListTest extends TestCase
{
    public function testConstructWithSelf(): void
    {
        /** @var MetadataEnricherInterface $mockEnricher */
        $mockEnricher = $this->createMock(MetadataEnricherInterface::class);
        $enricherList = new MetadataEnricherList([$mockEnricher]);
        $newList = new MetadataEnricherList($enricherList);
        $this->assertCount(1, $newList);
        $this->assertFalse($enricherList === $newList);
    }

    public function testWith(): void
    {
        $emptyList = new MetadataEnricherList;
        /** @var MetadataEnricherInterface $mockEnricher */
        $mockEnricher = $this->createMock(MetadataEnricherInterface::class);
        $enricherList = $emptyList->push($mockEnricher);
        $this->assertCount(1, $enricherList);
        $this->assertTrue($emptyList->isEmpty());
    }

    public function testPrependEnricher(): void
    {
        $mockEnricher = $this->createMock(MetadataEnricherInterface::class);
        $mockEnricher->expects($this->once())->method('enrich')->willReturnArgument(0);
        $enricherList = new MetadataEnricherList([$mockEnricher]);
        $newList = $enricherList->prependEnricher('key', 'value');
        $this->assertCount(2, $newList);
        $this->assertNotSame($enricherList, $newList);
        $this->assertFalse($enricherList === $newList);
        $metadata = Metadata::fromNative(['abc' => 'xyz']);
        /** @var MetadataEnricherInterface $enricher */
        foreach ($newList as $enricher) {
            $metadata = $enricher->enrich($metadata);
        }
        $this->assertEquals(['abc' => 'xyz', 'key' => 'value'], $metadata->toNative());
    }
}
