<?php

namespace Pepsit36\SummernoteBundle\Service;

use Symfony\Bridge\Twig\Extension\AssetExtension;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $assetPackages;
    private $rootDir;
    private $targetDir;

    function __construct(Packages $assetPackages)
    {
        $this->assetPackages = $assetPackages;
        $this->rootDir = '%kernel.root_dir%/../';
        $this->targetDir = 'uploads/images/summernote/';
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move(
            $this->rootDir.$this->targetDir,
            $fileName
        );

        return array(
            'webPath' => $this->assetPackages->getUrl($this->targetDir.'/'.$fileName),
            'fileName' => $fileName,
        );
    }

}
