<?php declare(strict_types=1);
/**
 * This file is part of the daikon-cqrs/metadata project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Daikon\Metadata;

use Daikon\DataStructure\MapInterface;
use Daikon\Interop\FromNativeInterface;
use Daikon\Interop\ToNativeInterface;

interface MetadataInterface extends MapInterface, FromNativeInterface, ToNativeInterface
{
    public static function makeEmpty(): self;
}
