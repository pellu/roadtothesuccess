<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Form\Tests\Extension\Core\Type;

/**
 * @author Stepan Anchugov <kixxx1@gmail.com>
 */
class BirthdayTypeTest extends BaseTypeTest
{
    /**
     * @group legacy
     */
    public function testLegacyName()
    {
        $form = $this->factory->create('birthday');

        $this->assertSame('birthday', $form->getConfig()->getType()->getName());
    }

    /**
     * @expectedException \Symfony\Component\OptionsResolver\Exception\InvalidOptionsException
     */
    public function testSetInvalidYearsOption()
    {
        $this->factory->create('Symfony\Component\Form\Extension\Core\Type\BirthdayType', null, array(
            'years' => 'bad value',
        ));
    }

    protected function getTestedType()
    {
        return 'Symfony\Component\Form\Extension\Core\Type\BirthdayType';
    }
}
