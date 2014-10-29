<?php
namespace common\component;

use Yii,
    CClientScript;

class ClientScript extends CClientScript
{

    protected $dependencies = array();
    protected $priority = array();

    /**
     * 把CSS排序加入进去渲染
     *
     * @param string $output
     */
    public function renderHead(&$output)
    {
        $cssFilesOrdered = array();
        $currentCssFiles = $this->cssFiles;

        if (!empty($this->priority)) {
            # assign 0 to anything without a specific priority
            # can't do this in the register method because not every CSS file that ends up here used it
            $cssFilesWithPrioritySet = array_keys($this->priority);
            foreach ($currentCssFiles as $path => $v) {
                if (!in_array($path, $cssFilesWithPrioritySet)) {
                    $this->priority[$path] = 0;
                }
            }

            asort($this->priority);
            foreach ($this->priority as $path => $id) {
                $cssFilesOrdered[$path] = $currentCssFiles[$path];
                unset($currentCssFiles[$path]);
            }
            # add any remaining CSS files that didn't have an order specified
            $cssFilesOrdered += $currentCssFiles;
        }

        if (!empty($cssFilesOrdered)) {
            $this->cssFiles = $cssFilesOrdered;
        }

        parent::renderHead($output);
    }

    /**
     * 重构css注册的方法
     *
     * @param   string     $url   文件路径
     * @param   string|int $media media类型|排序
     * @param   int|null   $order 排序
     * @return  $this|static
     *                            registerCssFile(url, content-type, order)
     *                            registerCssFile(url, order)
     */
    public function registerCssFile($url, $media = '', $order = null)
    {
        $arr   = parse_url($url);
        $fname = basename($arr['path']);
        $file  = dirname(Yii::app()->basePath) . '/../css/wap/' . $fname;
        if (file_exists($file)) {
            $url = isset($arr['query']) ? str_replace('?' . $arr['query'], '', $url) : $url;
            $url .= '?v=' . filemtime($file);
        }
        if (is_numeric($media)) {
            $order = $media;
            $media = '';
        }
        $this->setOrder($url, $order);
        return parent::registerCssFile($url, $media);
    }

    /**
     * 注册样式时可以多配置个排序
     *
     * @param string     $id    样式注册ID
     * @param string     $css   样式
     * @param string|int $media Content-Type
     * @param null|int   $order 排序
     * @return $this|static
     *                          registerCss(id, css, Content-type, order)
     *                          registerCss(id, css, order)
     */
    public function registerCss($id, $css, $media = '', $order = null)
    {
        if (is_numeric($media)) {
            $order = $media;
            $media = '';
        }
        $this->setOrder($id, $order);
        return parent::registerCss($id, $css, $media);
    }

    /**
     * 设置排序
     *
     * @param string $identifier
     * @param int    $order
     */
    private function setOrder($identifier, $order)
    {
        if (!is_null($order)) {
            if (is_array($order)) {
                $this->dependencies[$identifier] = $order;
            } elseif (is_numeric($order)) {
                $this->priority[$identifier] = $order;
            }
        }
    }

    /**
     * 重构js注册的方法
     *
     * @param   string $url      文件路径
     * @param   int    $position 要加载的位置
     * @param   array  $htmlOptions
     * @return  $this|static
     */
    public function registerScriptFile($url, $position = null, array $htmlOptions = array())
    {
        $arr = parse_url($url);
        if (stripos($url, 'www.to8to.com') != false) {
            $file = dirname(Yii::app()->basePath) . '/..' . $arr['path'];
        } else {
            $fname = basename($arr['path']);
            $file  = dirname(Yii::app()->basePath) . '/js/' . $fname;
        }
        if (file_exists($file)) {
            $url = isset($arr['query']) ? str_replace('?' . $arr['query'], '', $url) : $url;
            $url .= '?v=' . filemtime($file);
        }
        return parent::registerScriptFile($url, $position, $htmlOptions);
    }
}