<?php

namespace Symfony\Config\VichUploader;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Metadata'.\DIRECTORY_SEPARATOR.'FileCacheConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'Metadata'.\DIRECTORY_SEPARATOR.'DirectoryConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MetadataConfig 
{
    private $cache;
    private $type;
    private $fileCache;
    private $autoDetection;
    private $directories;
    private $_usedProperties = [];

    /**
     * @default 'file'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function cache($value): static
    {
        $this->_usedProperties['cache'] = true;
        $this->cache = $value;

        return $this;
    }

    /**
     * @default 'attribute'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function type($value): static
    {
        $this->_usedProperties['type'] = true;
        $this->type = $value;

        return $this;
    }

    /**
     * @default {"dir":"%kernel.cache_dir%\/vich_uploader"}
     */
    public function fileCache(array $value = []): \Symfony\Config\VichUploader\Metadata\FileCacheConfig
    {
        if (null === $this->fileCache) {
            $this->_usedProperties['fileCache'] = true;
            $this->fileCache = new \Symfony\Config\VichUploader\Metadata\FileCacheConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "fileCache()" has already been initialized. You cannot pass values the second time you call fileCache().');
        }

        return $this->fileCache;
    }

    /**
     * @default true
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function autoDetection($value): static
    {
        $this->_usedProperties['autoDetection'] = true;
        $this->autoDetection = $value;

        return $this;
    }

    public function directory(array $value = []): \Symfony\Config\VichUploader\Metadata\DirectoryConfig
    {
        $this->_usedProperties['directories'] = true;

        return $this->directories[] = new \Symfony\Config\VichUploader\Metadata\DirectoryConfig($value);
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('cache', $config)) {
            $this->_usedProperties['cache'] = true;
            $this->cache = $config['cache'];
            unset($config['cache']);
        }

        if (array_key_exists('type', $config)) {
            $this->_usedProperties['type'] = true;
            $this->type = $config['type'];
            unset($config['type']);
        }

        if (array_key_exists('file_cache', $config)) {
            $this->_usedProperties['fileCache'] = true;
            $this->fileCache = new \Symfony\Config\VichUploader\Metadata\FileCacheConfig($config['file_cache']);
            unset($config['file_cache']);
        }

        if (array_key_exists('auto_detection', $config)) {
            $this->_usedProperties['autoDetection'] = true;
            $this->autoDetection = $config['auto_detection'];
            unset($config['auto_detection']);
        }

        if (array_key_exists('directories', $config)) {
            $this->_usedProperties['directories'] = true;
            $this->directories = array_map(fn ($v) => new \Symfony\Config\VichUploader\Metadata\DirectoryConfig($v), $config['directories']);
            unset($config['directories']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['cache'])) {
            $output['cache'] = $this->cache;
        }
        if (isset($this->_usedProperties['type'])) {
            $output['type'] = $this->type;
        }
        if (isset($this->_usedProperties['fileCache'])) {
            $output['file_cache'] = $this->fileCache->toArray();
        }
        if (isset($this->_usedProperties['autoDetection'])) {
            $output['auto_detection'] = $this->autoDetection;
        }
        if (isset($this->_usedProperties['directories'])) {
            $output['directories'] = array_map(fn ($v) => $v->toArray(), $this->directories);
        }

        return $output;
    }

}
