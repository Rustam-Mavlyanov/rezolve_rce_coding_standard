<?php

declare(strict_types=1);

use Magento2\Rector\Src\AddArrayAccessInterfaceReturnTypes;
use Magento2\Rector\Src\ReplaceMbStrposNullLimit;
use Magento2\Rector\Src\ReplaceNewDateTimeNull;
use Magento2\Rector\Src\ReplacePregSplitNullLimit;
use Rector\Config\RectorConfig;
use Rector\DeadCode\Rector\ClassMethod\RemoveLastReturnRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUnusedPromotedPropertyRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessParamTagRector;
use Rector\DeadCode\Rector\ClassMethod\RemoveUselessReturnTagRector;
use Rector\DeadCode\Rector\Node\RemoveNonExistingVarAnnotationRector;
use Rector\DeadCode\Rector\StmtsAwareInterface\RemoveJustPropertyFetchForAssignRector;
use Rector\DeadCode\Rector\StmtsAwareInterface\RemoveJustVariableAssignRector;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->skip([
        __DIR__ . '/vendor',
        __DIR__ . '/rezolve_rce_coding_standard',
        __DIR__ . '/Tests',
        /**
         * remove rules
         */
        Rector\CodeQuality\Rector\If_\ExplicitBoolCompareRector::class,
        Rector\Php54\Rector\Array_\LongArrayToShortArrayRector::class,

        /**
         * dead block comments
         */
        RemoveUselessParamTagRector::class,
        RemoveUselessReturnTagRector::class,
        RemoveNonExistingVarAnnotationRector::class,
        RemoveUnusedPromotedPropertyRector::class,
        RemoveLastReturnRector::class,
        RemoveJustPropertyFetchForAssignRector::class,
        RemoveJustVariableAssignRector::class,
    ]);


    /**
     * Magento rules
     */
    $rectorConfig->rules([
        AddArrayAccessInterfaceReturnTypes::class,
        ReplaceMbStrposNullLimit::class,
        ReplaceNewDateTimeNull::class,
        ReplacePregSplitNullLimit::class
    ]);


    // define sets of rules
    $rectorConfig->sets([
        LevelSetList::UP_TO_PHP_74,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE
    ]);
};