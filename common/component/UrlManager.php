<?php
/**
 * Created by PhpStorm.
 * User: hailin.wu
 * Date: 2014/10/9
 * Time: 14:01
 */
namespace common\component;

class UrlManager extends \CUrlManager
{
    private $_rules=array();

    /**
     * Creates a path info based on the given parameters.
     * @param array $params list of GET parameters
     * @param string $equal the separator between name and value
     * @param string $ampersand the separator between name-value pairs
     * @param string $key this is used internally.
     * @return string the created path info
     */
    public function createPathInfo($params,$equal,$ampersand, $key=null)
    {
        $pairs = array();
        foreach($params as $k => $v)
        {
            if('page' == $k and $v <= 0){
                continue;
            }
            if ($key!==null)
                $k = $key.'['.$k.']';

            if (is_array($v))
                $pairs[]=$this->createPathInfo($v,$equal,$ampersand, $k);
            else
                $pairs[]=urlencode($k).$equal.urlencode($v);
        }
        return implode($ampersand,$pairs);
    }

    /**
     * Creates a URL based on default settings.
     * @param string $route the controller and the action (e.g. article/read)
     * @param array $params list of GET parameters
     * @param string $ampersand the token separating name-value pairs in the URL.
     * @return string the constructed URL
     */
    protected function createUrlDefault($route,$params,$ampersand)
    {
        if($this->getUrlFormat()===self::PATH_FORMAT)
        {
            $url=rtrim($this->getBaseUrl().'/'.$route,'/');
            if($this->appendParams)
            {
                $url=rtrim($url.'/'.$this->createPathInfo($params,'/','/'),'/');
                return $route==='' ? $url : $url.$this->urlSuffix;
            }
            else
            {
                if($route!=='')
                    $url.=$this->urlSuffix;
                $query=$this->createPathInfo($params,'=',$ampersand);
                return $query==='' ? $url : $url.'?'.$query;
            }
        }
        else
        {
            $url=$this->getBaseUrl();
            if(!$this->showScriptName)
                $url.='/';
            if($route!=='')
            {
                $url.='?'.$this->routeVar.'='.$route;
                if(($query=$this->createPathInfo($params,'=',$ampersand))!=='')
                    $url.=$ampersand.$query;
            }
            elseif(($query=$this->createPathInfo($params,'=',$ampersand))!=='')
                $url.='?'.$query;
            return $url;
        }
    }

    /**
     * Constructs a URL.
     * @param string $route the controller and the action (e.g. article/read)
     * @param array $params list of GET parameters (name=>value). Both the name and value will be URL-encoded.
     * If the name is '#', the corresponding value will be treated as an anchor
     * and will be appended at the end of the URL.
     * @param string $ampersand the token separating name-value pairs in the URL. Defaults to '&'.
     * @return string the constructed URL
     */
    public function createUrl($route,$params=array(),$ampersand='&')
    {
        unset($params[$this->routeVar]);
        foreach($params as $i=>$param)
            if($param===null)
                $params[$i]='';

        if(isset($params['#']))
        {
            $anchor='#'.$params['#'];
            unset($params['#']);
        }
        else
            $anchor='';
        $route=trim($route,'/');
        foreach($this->_rules as $i=>$rule)
        {
            if(is_array($rule))
                $this->_rules[$i]=$rule=Yii::createComponent($rule);
            if(($url=$rule->createUrl($this,$route,$params,$ampersand))!==false)
            {
                if($rule->hasHostInfo)
                    return $url==='' ? '/'.$anchor : $url.$anchor;
                else
                    return $this->getBaseUrl().'/'.$url.$anchor;
            }
        }
        return $this->createUrlDefault($route,$params,$ampersand).$anchor;
    }
} 