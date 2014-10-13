<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/10/10
 * Time: 17:33
 */
class ClientScript extends CClientScript
{

    protected $dependencies = array();
    protected $priority = array();

    public function renderHead(&$output)
    {
        $cssFilesOrdered = array();
        $currentCssFiles = $this->cssFiles;

        if (!empty($this->priority)){
            # assign 0 to anything without a specific priority
            # can't do this in the register method because not every CSS file that ends up here used it
            $cssFilesWithPrioritySet = array_keys($this->priority);
            foreach ($currentCssFiles as $path => $v){
                if (!in_array($path, $cssFilesWithPrioritySet)){
                    $this->priority[$path] = 0;
                }
            }

            asort($this->priority);
            foreach ($this->priority as $path => $id){
                $cssFilesOrdered[$path] = $currentCssFiles[$path];
                unset($currentCssFiles[$path]);
            }
            # add any remaining CSS files that didn't have an order specified
            $cssFilesOrdered += $currentCssFiles;
        }

        if (!empty($cssFilesOrdered)){
            $this->cssFiles = $cssFilesOrdered;
        }

        parent::renderHead($output);
    }

    /**
     * 重构css注册的方法
     *
     * @param   string  $url    文件路径
     * @param   string  $media  media类型
     * @param   int|null $order 排序
     * @return  ClientScript
     */
    public function registerCssFile($url, $media = '', $order = null)
    {
        $arr    = parse_url($url);
        $fname  = basename($arr['path']);
        $file   = dirname( Yii::app()->basePath ).'/../css/wap/'.$fname;
        if ( file_exists($file) ) {
            $url    = isset($arr['query']) ? str_replace('?'.$arr['query'], '', $url) : $url;
            $url   .= '?v='.filemtime($file);
        }
        $this->setOrder($url, $order);
        return parent::registerCssFile($url, $media);
    }

    public function registerCss($id, $css, $media = '', $order = null)
    {
        $this->setOrder($id, $order);
        return parent::registerCss($id, $css, $media);
    }

    private function setOrder($identifier, $order)
    {
        if (!is_null($order)){
            if (is_array($order)){
                $this->dependencies[$identifier] = $order;
            } elseif (is_numeric($order)){
                $this->priority[$identifier] = $order;
            }
        }
    }

    /**
     * 重构js注册的方法
     *
     * @param   string  $url        文件路径
     * @param   int     $position   要加载的位置
     * @return  object
     */
    public function registerScriptFile( $url, $position = null ) {
        $arr    = parse_url($url);
        if ( stripos($url, 'www.to8to.com') != false ) {
            $file   = dirname( Yii::app()->basePath ).'/..'.$arr['path'];
        } else {
            $fname  = basename($arr['path']);
            $file   = dirname( Yii::app()->basePath ).'/js/'.$fname;
        }
        if ( file_exists($file) ) {
            $url    = isset($arr['query']) ? str_replace('?'.$arr['query'], '', $url) : $url;
            $url   .= '?v='.filemtime($file);
        }
        return parent::registerScriptFile($url, $position);
    }
}