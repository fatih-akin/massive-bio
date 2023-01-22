<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CurrencyEnum extends Enum
{
    const USD = 'USD';
    const GBP = 'GBP';
    const EUR = 'EUR';
    const JPY = 'JPY';
    const AED = 'AED';
}
