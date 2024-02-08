<?php

namespace App\Http\Controllers;

use App\Models\Repositories\UrlRepositoryException;
use App\Models\Repositories\UrlRepositoryInterface;
use App\Services\UrlEncoderInterface;
use Illuminate\Support\Facades\Redirect;

class RestoreUrlController
{
    public function index($shortUrl, UrlRepositoryInterface $urlRepository, UrlEncoderInterface $urlEncoder)
    {
        try {
            $originalUrlId = $urlEncoder->convertShortUrlToId($shortUrl);

            $originalUrl = $urlRepository->getUrlById($originalUrlId);
            if (!$originalUrl) {
                throw new RestoreUrlControllerException('URL is not found', 404);
            }

            if (!str_starts_with($originalUrl, 'http')) {
                $originalUrl = 'http://' . $originalUrl;
            }

            return Redirect::to($originalUrl);

        } catch (RestoreUrlControllerException $controllerException) {
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
