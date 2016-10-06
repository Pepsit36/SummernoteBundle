<?php

namespace Pepsit36\SummernoteBundle\Service;

use Pepsit36\SummernoteBundle\Exception\UploadException;
use Symfony\Component\Asset\Packages;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{

    private $assetPackages;
    private $webDir;
    private $targetDir;

    public function __construct(Packages $assetPackages, $kernel_dir, $widgetConfig)
    {
        $this->assetPackages = $assetPackages;
        $this->webDir = $kernel_dir.'/../web/';
        $this->targetDir = $widgetConfig['images_path'].'/';
    }

    public function upload(UploadedFile $file)
    {
        $fileName = md5(uniqid()).'.'.$file->guessExtension();

        if (!file_exists($this->webDir.$this->targetDir)) {
            throw new UploadException('Storage Folder not Found');
        }

        try {
            $file->move(
                $this->webDir.$this->targetDir,
                $fileName
            );
        } catch (FileException $e) {
            throw new UploadException('Upload Failed : '.$e->getMessage());
        }

        return array(
            'webPath' => $this->assetPackages->getUrl($this->targetDir.'\\'.$fileName),
            'fileName' => $fileName,
        );
    }

}
