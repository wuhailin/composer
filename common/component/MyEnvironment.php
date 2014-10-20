<?php
/**
 * Created by PhpStorm.
 * User: ゛嗨⑩啉°
 * Date: 14-9-20
 * Time: 上午12:19
 */
namespace common\component;

use marcovtwout\YiiEnvironment\Environment;

require_once __DIR__ . '/../../vendor/marcovtwout/yii-environment/Environment.php';

class MyEnvironment extends Environment
{
    protected $sitePath = null;
    protected static $instance = null;

    /**
     * @param null|string $sitePath
     * @param null        $mode
     */
    public function __construct($sitePath, $mode = null)
    {
        self::$instance = $this;
        $this->sitePath = $sitePath;
        if (null === $mode) {
            $mode = require __DIR__ . '/../config/mode.php';
        }
        $this->configDir = __DIR__ . '/../config';
        parent::__construct($mode, $this->configDir);
    }

    public function getValidModes()
    {
        return [
            100 => 'DEVELOPMENT',
            101 => 'STABLE',
            200 => 'TEST',
            300 => 'STAGING',
            400 => 'PRODUCTION',
        ];
    }

    public static function getInstance()
    {
        return self::$instance;
    }

    protected function getDefine()
    {
        $dir             = $this->configDir;
        $fileLocalDefine = $dir . '/define_local.php';
        //存在本地常量定义文件则引入本地常量文件
        if (file_exists($fileLocalDefine)) {
            require_once $fileLocalDefine;
        } else {
            //引入模型配置文件
            $fileSpecificDefine = $dir . '/define_' . strtolower($this->mode) . '.php';
            if (!file_exists($fileSpecificDefine)) {
                throw new \Exception('模式常量文件"' . $fileSpecificDefine . '"不存在.');
            }
            require_once $fileSpecificDefine;
        }
        $fileMainDefine = $dir . 'define.php';
        if (!file_exists($fileMainDefine)) {
            throw new \Exception('主常量文件"' . $fileMainDefine . '"不存在.');
        }
        require_once $fileMainDefine;
    }

    protected function getConfig()
    {
        /*$config = parent::getConfig();*/

        $fileMainConfig = $this->configDir . 'main.php';
        if (!file_exists($fileMainConfig)) {
            throw new \Exception('Cannot find main config file "' . $fileMainConfig . '".');
        }
        $configMain = require($fileMainConfig);

        // Load specific config
        $fileSpecificConfig = $this->configDir . 'mode_' . strtolower($this->mode) . '.php';
        if (!file_exists($fileSpecificConfig)) {
            throw new \Exception('Cannot find mode specific config file "' . $fileSpecificConfig . '".');
        }
        $configSpecific = require($fileSpecificConfig);

        // Merge specific config into main config
        $config = self::mergeArray($configSpecific, $configMain);

        // If one exists, load and merge local config
        $fileLocalConfig = $this->configDir . 'local.php';
        if (file_exists($fileLocalConfig)) {
            $configLocal = require($fileLocalConfig);
            $config      = self::mergeArray($configLocal, $config);
        }

        $dir            = $this->sitePath;
        $fileMainConfig = $dir . '/config/main.php';
        if (!file_exists($fileMainConfig)) {
            throw new \Exception('主配置文件"' . $fileMainConfig . '"找不到.');
        }
        $configMain = require $fileMainConfig;
        $config = self::mergeArray($config, $configMain);

        $fileSpecficFile = $dir . '/config/mode_' . strtolower($this->mode) . '.php';
        if (file_exists($fileSpecficFile)) {
            $fileSpecficConfig = require $fileSpecficFile;
            $config            = self::mergeArray($fileSpecficConfig, $config);
        }

        $fileLocalFile = $dir . '/config/mode_local.php';
        if (file_exists($fileLocalFile)) {
            $fileLocalConfig = require $fileLocalFile;
            $config          = self::mergeArray($config, $fileLocalConfig);
        }

        return $config;
    }

    protected function setEnvironment()
    {
        $this->getDefine();
        parent::setEnvironment();
    }

    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Run Yii static functions.
     * Call this function after including the Yii framework in your bootstrap file.
     */
    public function setAlias()
    {
        // Yii::setPathOfAlias();
        foreach ($this->configWeb['aliases'] as $alias => $path) {
            \Yii::setPathOfAlias($alias, $path);
        }
    }
} 