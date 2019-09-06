<?php
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\Tests\Metadata;

use Daikon\Metadata\MetadataEnricherInterface;
use Daikon\Metadata\MetadataEnricherList;
use PHPUnit\Framework\TestCase;

final class MetadataEnricherListTest extends TestCase
{
    public function testPush()
    {
        $emptyList = new MetadataEnricherList;
        $enricherList = $emptyList->push(
            $this->getMockBuilder(MetadataEnricherInterface::CLASS)->getMock()
        );
        $this->assertCount(1, $enricherList);
        $this->assertTrue($emptyList->isEmpty());
    }
}
