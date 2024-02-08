<?php

namespace App\Http\Controllers;

use App\Models\Repositories\UrlRepositoryException;
use App\Models\Repositories\UrlRepositoryInterface;
use App\Services\UrlEncoderInterface;
use Illuminate\Http\Request;

class MinimizeUrlController
{
    public function index(Request $request, UrlRepositoryInterface $urlRepository, UrlEncoderInterface $urlEncoder)
    {
        try {
            $hostName = $request->server->get('HTTP_HOST');

            $originalUrl = $request->get('url');
            if (!$originalUrl) {
                throw new MinimizeUrlControllerException('URL is not defined', 400);
            }

            $originalUrlId = $urlRepository->insertUrlAndGetId($originalUrl);
            $shortUrl = $urlEncoder->convertIdToShortUrl($hostName, $originalUrlId);

            return response()->json([
                'code' => 200,
                'shortUrl' => $shortUrl,
            ], 200);

        } catch (MinimizeUrlControllerException $controllerException) {
            return response()->json([
                'code' => $controllerException->getCode(),
                'message' => $controllerException->getMessage(),
            ], $controllerException->getCode());

        } catch (UrlRepositoryException $repositoryException) {
            return response()->json([
                'code' => 500,
                'message' => 'Database error',
            ], 500);
        }
    }
}
