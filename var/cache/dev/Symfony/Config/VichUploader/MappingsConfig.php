<?php

namespace Symfony\Config\VichUploader;

require_once __DIR__.\DIRECTORY_SEPARATOR.'MappingsConfig'.\DIRECTORY_SEPARATOR.'NamerConfig.php';
require_once __DIR__.\DIRECTORY_SEPARATOR.'MappingsConfig'.\DIRECTORY_SEPARATOR.'DirectoryNamerConfig.php';

use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;

/**
 * This class is automatically generated to help in creating a config.
 */
class MappingsConfig 
{
    private $uriPrefix;
    private $uploadDestination;
    private $namer;
    private $directoryNamer;
    private $deleteOnRemove;
    private $eraseFields;
    private $deleteOnUpdate;
    private $injectOnLoad;
    private $namerKeepExtension;
    private $dbDriver;
    private $_usedProperties = [];

    /**
     * @default '/uploads'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function uriPrefix($value): static
    {
        $this->_usedProperties['uriPrefix'] = true;
        $this->uriPrefix = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function uploadDestination($value): static
    {
        $this->_usedProperties['uploadDestination'] = true;
        $this->uploadDestination = $value;

        return $this;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @default {"service":null,"options":null}
     * @return \Symfony\Config\VichUploader\MappingsConfig\NamerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\VichUploader\MappingsConfig\NamerConfig : static)
     */
    public function namer(string|array $value = []): \Symfony\Config\VichUploader\MappingsConfig\NamerConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['namer'] = true;
            $this->namer = $value;

            return $this;
        }

        if (!$this->namer instanceof \Symfony\Config\VichUploader\MappingsConfig\NamerConfig) {
            $this->_usedProperties['namer'] = true;
            $this->namer = new \Symfony\Config\VichUploader\MappingsConfig\NamerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "namer()" has already been initialized. You cannot pass values the second time you call namer().');
        }

        return $this->namer;
    }

    /**
     * @template TValue of string|array
     * @param TValue $value
     * @default {"service":null,"options":null}
     * @return \Symfony\Config\VichUploader\MappingsConfig\DirectoryNamerConfig|$this
     * @psalm-return (TValue is array ? \Symfony\Config\VichUploader\MappingsConfig\DirectoryNamerConfig : static)
     */
    public function directoryNamer(string|array $value = []): \Symfony\Config\VichUploader\MappingsConfig\DirectoryNamerConfig|static
    {
        if (!\is_array($value)) {
            $this->_usedProperties['directoryNamer'] = true;
            $this->directoryNamer = $value;

            return $this;
        }

        if (!$this->directoryNamer instanceof \Symfony\Config\VichUploader\MappingsConfig\DirectoryNamerConfig) {
            $this->_usedProperties['directoryNamer'] = true;
            $this->directoryNamer = new \Symfony\Config\VichUploader\MappingsConfig\DirectoryNamerConfig($value);
        } elseif (0 < \func_num_args()) {
            throw new InvalidConfigurationException('The node created by "directoryNamer()" has already been initialized. You cannot pass values the second time you call directoryNamer().');
        }

        return $this->directoryNamer;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function deleteOnRemove($value): static
    {
        $this->_usedProperties['deleteOnRemove'] = true;
        $this->deleteOnRemove = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function eraseFields($value): static
    {
        $this->_usedProperties['eraseFields'] = true;
        $this->eraseFields = $value;

        return $this;
    }

    /**
     * @default true
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function deleteOnUpdate($value): static
    {
        $this->_usedProperties['deleteOnUpdate'] = true;
        $this->deleteOnUpdate = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function injectOnLoad($value): static
    {
        $this->_usedProperties['injectOnLoad'] = true;
        $this->injectOnLoad = $value;

        return $this;
    }

    /**
     * @default false
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function namerKeepExtension($value): static
    {
        $this->_usedProperties['namerKeepExtension'] = true;
        $this->namerKeepExtension = $value;

        return $this;
    }

    /**
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function dbDriver($value): static
    {
        $this->_usedProperties['dbDriver'] = true;
        $this->dbDriver = $value;

        return $this;
    }

    public function __construct(array $config = [])
    {
        if (array_key_exists('uri_prefix', $config)) {
            $this->_usedProperties['uriPrefix'] = true;
            $this->uriPrefix = $config['uri_prefix'];
            unset($config['uri_prefix']);
        }

        if (array_key_exists('upload_destination', $config)) {
            $this->_usedProperties['uploadDestination'] = true;
            $this->uploadDestination = $config['upload_destination'];
            unset($config['upload_destination']);
        }

        if (array_key_exists('namer', $config)) {
            $this->_usedProperties['namer'] = true;
            $this->namer = \is_array($config['namer']) ? new \Symfony\Config\VichUploader\MappingsConfig\NamerConfig($config['namer']) : $config['namer'];
            unset($config['namer']);
        }

        if (array_key_exists('directory_namer', $config)) {
            $this->_usedProperties['directoryNamer'] = true;
            $this->directoryNamer = \is_array($config['directory_namer']) ? new \Symfony\Config\VichUploader\MappingsConfig\DirectoryNamerConfig($config['directory_namer']) : $config['directory_namer'];
            unset($config['directory_namer']);
        }

        if (array_key_exists('delete_on_remove', $config)) {
            $this->_usedProperties['deleteOnRemove'] = true;
            $this->deleteOnRemove = $config['delete_on_remove'];
            unset($config['delete_on_remove']);
        }

        if (array_key_exists('erase_fields', $config)) {
            $this->_usedProperties['eraseFields'] = true;
            $this->eraseFields = $config['erase_fields'];
            unset($config['erase_fields']);
        }

        if (array_key_exists('delete_on_update', $config)) {
            $this->_usedProperties['deleteOnUpdate'] = true;
            $this->deleteOnUpdate = $config['delete_on_update'];
            unset($config['delete_on_update']);
        }

        if (array_key_exists('inject_on_load', $config)) {
            $this->_usedProperties['injectOnLoad'] = true;
            $this->injectOnLoad = $config['inject_on_load'];
            unset($config['inject_on_load']);
        }

        if (array_key_exists('namer_keep_extension', $config)) {
            $this->_usedProperties['namerKeepExtension'] = true;
            $this->namerKeepExtension = $config['namer_keep_extension'];
            unset($config['namer_keep_extension']);
        }

        if (array_key_exists('db_driver', $config)) {
            $this->_usedProperties['dbDriver'] = true;
            $this->dbDriver = $config['db_driver'];
            unset($config['db_driver']);
        }

        if ($config) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($config)));
        }
    }

    public function toArray(): array
    {
        $output = [];
        if (isset($this->_usedProperties['uriPrefix'])) {
            $output['uri_prefix'] = $this->uriPrefix;
        }
        if (isset($this->_usedProperties['uploadDestination'])) {
            $output['upload_destination'] = $this->uploadDestination;
        }
        if (isset($this->_usedProperties['namer'])) {
            $output['namer'] = $this->namer instanceof \Symfony\Config\VichUploader\MappingsConfig\NamerConfig ? $this->namer->toArray() : $this->namer;
        }
        if (isset($this->_usedProperties['directoryNamer'])) {
            $output['directory_namer'] = $this->directoryNamer instanceof \Symfony\Config\VichUploader\MappingsConfig\DirectoryNamerConfig ? $this->directoryNamer->toArray() : $this->directoryNamer;
        }
        if (isset($this->_usedProperties['deleteOnRemove'])) {
            $output['delete_on_remove'] = $this->deleteOnRemove;
        }
        if (isset($this->_usedProperties['eraseFields'])) {
            $output['erase_fields'] = $this->eraseFields;
        }
        if (isset($this->_usedProperties['deleteOnUpdate'])) {
            $output['delete_on_update'] = $this->deleteOnUpdate;
        }
        if (isset($this->_usedProperties['injectOnLoad'])) {
            $output['inject_on_load'] = $this->injectOnLoad;
        }
        if (isset($this->_usedProperties['namerKeepExtension'])) {
            $output['namer_keep_extension'] = $this->namerKeepExtension;
        }
        if (isset($this->_usedProperties['dbDriver'])) {
            $output['db_driver'] = $this->dbDriver;
        }

        return $output;
    }

}
