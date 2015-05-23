<?php

namespace Vincecore\IdeLinkBundle\Twig\Extension;

use Symfony\Bridge\Twig\Extension\CodeExtension as BaseCodeExtension;

class CodeExtension extends BaseCodeExtension
{
    /**
     * @var string
     */
    protected $fileLinkFormat;

    /**
     * @var string
     */
    private $wrongPath;

    /**
     * @var string
     */
    private $correctPath;


    public function __construct($fileLinkFormat, $rootDir, $charset, $wrongPath, $correctPath)
    {
        $this->fileLinkFormat = $fileLinkFormat ?: ini_get('xdebug.file_link_format') ?: get_cfg_var('xdebug.file_link_format');
        $this->wrongPath = $wrongPath;
        $this->correctPath = $correctPath;
        parent::__construct($fileLinkFormat, $rootDir, $charset);
    }

    /**
     * @inheritdoc
     */
    public function getFileLink($file, $line)
    {
        if ($this->fileLinkFormat && is_file($file)) {
            $file = str_replace($this->wrongPath, $this->correctPath, $file);
            return strtr($this->fileLinkFormat, array('%f' => $file, '%l' => $line));
        }

        return false;
    }
}
