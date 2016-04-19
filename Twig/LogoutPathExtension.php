<?php

/*
 * 基于MIT开源协议发布
 *
 * (c) Efeen Cheung <261969254@qq.com>
 *
 * 有事请联系QQ:261969254, 微信:efeencheung, Github:efeencheung
 */

namespace Dm\Bundle\ThemeBundle\Twig;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Http\Logout\LogoutUrlGenerator;

/**
 * 生成一个退出的Path，并抑制在没有Firewall时的异常抛出
 */
class LogoutPathExtension extends \Twig_Extension
{   
    /** 
     * 安全组件，当前Firewall下的退出路径生成器
     *
     * @var \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator  
     */ 
    private $generator;

    public function __construct(LogoutUrlGenerator $generator)
    {   
        $this->generator = $generator;   
    }   

    /**
     * {@inheritdoc}           
     */ 
    public function getFunctions()  
    {   
        return array(          
            'logout_path_no_exception' => new \Twig_Function_Method($this, 'getLogoutPath'),
        );
    }

    public function getLogoutPath()
    {
        try {
            $path = $this->generator->getLogoutPath(null, UrlGeneratorInterface::ABSOLUTE_PATH);
        } catch (\Exception $e){
            $path = 'javascript:;';
        }
        return $path;
    }

    /**
     * {@inheritdoc}           
     */ 
    public function getName()  
    {
        return 'logout_path_no_exception';
    }
}
