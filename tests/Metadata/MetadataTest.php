<?php
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Daikon\Tests\Metadata;

use Daikon\Metadata\Metadata;
use PHPUnit\Framework\TestCase;

final class MetadataTest extends TestCase
{
    public function testFromNative()
    {
        $metadata = Metadata::fromNative([
            "some_string" => "foo",
            "some_yay" => true,
            "some_number" => 23,
            "some_float" => 23.42,
            "some_array" => [ "captain" => "arr" ]
        ]);
        $this->assertEquals($metadata->get("some_string"), "foo");
        $this->assertTrue($metadata->get("some_yay"));
        $this->assertEquals($metadata->get("some_number"), 23);
        $this->assertEquals($metadata->get("some_float"), 23.42);
        $this->assertEquals($metadata->get("some_array"), [ "captain" => "arr" ]);
    }

    public function testToNative()
    {
        $metadataArray = [
            "foo" => "bar",
            "yay_or_nay" => true,
            "some_number" => 23,
            "some_float" => 23.42,
            "some_array" => [ "captain" => "arr" ]
        ];
        $metadata = Metadata::fromNative($metadataArray);
        $this->assertEquals($metadata->toNative(), $metadataArray);
    }

    public function testWith()
    {
        $emptyMetadata = Metadata::makeEmpty();
        $metadata = $emptyMetadata->with("foo", "bar");
        $this->assertNull($emptyMetadata->get("foo"));
        $this->assertEquals($metadata->get("foo"), "bar");
        $this->assertFalse($metadata->equals($emptyMetadata));
    }

    public function testMagicGet()
    {
        $metadata = Metadata::makeEmpty()->with("foo", [ "bar" => "foobar" ]);
        $this->assertEquals($metadata->foo, [ "bar" => "foobar" ]);
    }

    public function testEquals()
    {
        $metadata = Metadata::makeEmpty()->with("foo", "bar");
        $this->assertTrue($metadata->equals(Metadata::fromNative([ "foo" => "bar" ])));
        $this->assertFalse($metadata->equals(Metadata::fromNative([ "foo" => "baz" ])));
    }
}
