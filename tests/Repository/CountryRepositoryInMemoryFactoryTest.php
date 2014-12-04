<?php
/**
 * File CountryRepositoryInMemoryFactoryTest.php
 * Created at: 2014-12-04 05-38
 *
 * @author Daniel Bojdo <daniel.bojdo@web-it.eu>
 */

namespace Webit\Addressing\Tests\Repository;


use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Collections\ArrayCollection;
use Webit\Addressing\Repository\CountryRepositoryInMemoryFactory;

class CountryRepositoryInMemoryFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @return string
     */
    private function getSourceDir()
    {
        return __DIR__.'/../../src/Resources';
    }

    /**
     * @return string
     */
    private function getCacheDir()
    {
        return sys_get_temp_dir() .'/' . md5(microtime().mt_rand(0, 10000));
    }

    /**
     * @test
     */
    public function shouldCreateRepository()
    {
        $factory = new CountryRepositoryInMemoryFactory($this->getSourceDir());
        $repository = $factory->createCountryRepository('en');
        $this->assertInstanceOf('Webit\Addressing\Repository\CountryRepositoryInMemory', $repository);
    }

    /**
     * @test
     */
    public function shouldUseCacheIfPresent()
    {
        $cache = $this->createCache();
        $cache->expects($this->once())
                ->method('contains')
                ->with($this->isType('string'))
                ->willReturn(false);

        $cache->expects($this->once())
                ->method('save')
                ->with($this->isType('string'), $this->isInstanceOf('Doctrine\Common\Collections\ArrayCollection'));

        $factory = new CountryRepositoryInMemoryFactory($this->getSourceDir(), $cache);
        $factory->createCountryRepository('en');
    }

    /**
     * @test
     */
    public function shouldReadFromCacheIfCacheContains()
    {
        $cache = $this->createCache();
        $cache->expects($this->once())
            ->method('contains')
            ->willReturn(true);

        $cache->expects($this->never())
            ->method('save');

        $cache->expects($this->once())
            ->method('fetch')->with($this->isType('string'))
            ->willReturn($this->createArrayCollection());

        $factory = new CountryRepositoryInMemoryFactory($this->getSourceDir(), $cache);
        $factory->createCountryRepository('en');
    }

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function shouldThrowExceptionForUnsupportedLanguage()
    {
        $factory = new CountryRepositoryInMemoryFactory($this->getSourceDir());
        $factory->createCountryRepository('ch');
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|Cache
     */
    private function createCache()
    {
        $cache = $this->getMock('Doctrine\Common\Cache\Cache');

        return $cache;
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject|ArrayCollection
     */
    private function createArrayCollection()
    {
        $collection = $this->getMock('Doctrine\Common\Collections\ArrayCollection');
        $collection->expects($this->any())->method('getIterator')->willReturn($this->getMock('\Iterator'));

        return $collection;
    }
} 