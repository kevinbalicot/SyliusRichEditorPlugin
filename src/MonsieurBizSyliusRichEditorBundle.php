<?php

/*
 * This file is part of Monsieur Biz' Rich Editor plugin for Sylius.
 *
 * (c) Monsieur Biz <sylius@monsieurbiz.com>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace MonsieurBiz\SyliusRichEditorPlugin;

use MonsieurBiz\SyliusRichEditorPlugin\DependencyInjection\UiElementRegistryPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class MonsieurBizSyliusRichEditorBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);
        $container->addCompilerPass(new UiElementRegistryPass());
    }

    public static function imageMediaManagerExists(): bool
    {
        return class_exists('MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\ImageType');
    }

    public static function videoMediaManagerExists(): bool
    {
        return class_exists('MonsieurBiz\SyliusMediaManagerPlugin\Form\Type\VideoType');
    }

    public static function fileExtensionMediaManagerExists(): bool
    {
        return class_exists('MonsieurBiz\SyliusMediaManagerPlugin\Twig\Extension\FileExtension');
    }
}
