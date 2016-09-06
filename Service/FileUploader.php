<?php

namespace Pepsit36\SummernoteBundle\Service;

use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $assetPackages;
    private $webDir;
    private $targetDir;

    function __construct(Packages $assetPackages, $kernel_dir)
    {
        $this->assetPackages = $assetPackages;
        $this->webDir = $kernel_dir.'\\..\\web\\';
        $this->targetDir = 'uploads\\images\\summernote\\';
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move(
            $this->webDir.$this->targetDir,
            $fileName
        );

        return array(
            'webPath' => $this->assetPackages->getUrl($this->targetDir.'\\'.$fileName),
            'fileName' => $fileName,
        );
    }

}
