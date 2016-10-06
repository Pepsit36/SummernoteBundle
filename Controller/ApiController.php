<?php

namespace Pepsit36\SummernoteBundle\Controller;

use Pepsit36\SummernoteBundle\Entity\SummernoteImage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends Controller
{
    public function uploadAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        if (!$request->isXmlHttpRequest()) {
            throw $this->createNotFoundException('This method has to be called by ajax');
        }

        try {
            $file = $request->files->get('summernote_image');

            $fileInfo = $this->get('pepsit36_summernote.file_upload')->upload($file);

            $image = new SummernoteImage();
            $image->setName($fileInfo['fileName']);

            $em->persist($image);
            $em->flush();

            return new JsonResponse(array('success' => true, 'url' => $fileInfo['webPath']));
        } catch (\Exception $e) {
            $logger = $this->get('logger');
            $logger->error('Error occurred during the image upload : '.$e->getMessage());

            return new JsonResponse(array('success' => false, 'message' => 'Error occurred during the image upload.'));
        }
    }

}
