<?php

namespace Distill\Tests\Method\Extension;

use Distill\Method;
use Distill\Format;
use Distill\Tests\Method\AbstractMethodTest;

class PharDataTest extends AbstractMethodTest
{

    public function setUp()
    {
        $this->method = new Method\Extension\PharData();

        if (false === $this->method->isSupported()) {
            $this->markTestSkipped('The PharData method is not available');
        }

        parent::setUp();
    }

    public function testExtractCorrectTarFile()
    {
        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_ok.tar', $target, new Format\Tar());

        $this->assertTrue($response);
        $this->checkDirectoryFiles($target, $this->filesPath . '/uncompressed');
        $this->clearTemporaryPath();
    }

    public function testExtractFakeTarFile()
    {
        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_fake.tar', $target, new Format\Tar());

        $this->assertFalse($response);
        $this->clearTemporaryPath();
    }

    public function testExtractCorrectTarBz2File()
    {
        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_ok.tar.bz2', $target, new Format\TarBz2());

        $this->assertTrue($response);
        $this->checkDirectoryFiles($target, $this->filesPath . '/uncompressed');
        $this->clearTemporaryPath();
    }

    public function testExtractFakeBz2File()
    {
        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_fake.tar.bz2', $target, new Format\TarBz2());

        $this->assertFalse($response);
        $this->clearTemporaryPath();
    }

    public function testExtractCorrectTarGzFile()
    {
        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_ok.tar.gz', $target, new Format\TarGz());

        $this->assertTrue($response);
        $this->checkDirectoryFiles($target, $this->filesPath . '/uncompressed');
        $this->clearTemporaryPath();
    }

    public function testExtractFakeGzFile()
    {
        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $response = $this->extract('file_fake.tar.gz', $target, new Format\TarGz());

        $this->assertFalse($response);
        $this->clearTemporaryPath();
    }

    public function testExtractNoPharDataFile()
    {
        $this->setExpectedException('Distill\\Exception\\Method\\FormatNotSupportedInMethodException');

        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $this->extract('file_ok.cab', $target, new Format\Cab());

        $this->clearTemporaryPath();
    }

    public function testExtractTarFileWithWrongFormat()
    {
        $this->setExpectedException('Distill\\Exception\\Method\\FormatNotSupportedInMethodException');

        $target = $this->getTemporaryPath();
        $this->clearTemporaryPath();

        $this->extract('file_ok.tar', $target, new Format\Bz2());

        $this->clearTemporaryPath();
    }

}
