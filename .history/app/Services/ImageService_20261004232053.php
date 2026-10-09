<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ImageService
{
    public function saveBase64(?string $base64, string $prefix): ?string
    {
        if (!$base64) return null;

        if (!preg_match('/^data:image\/(png|jpe?g|gif|webp);base64,([A-Za-z0-9+\/=]+)$/i', $base64, $matches)) {
            throw ValidationException::withMessages(['photo_data' => 'Upload a valid JPG, PNG, GIF, or WebP image.']);
        }

        $ext = strtolower($matches[1]) === 'jpeg' ? 'jpg' : strtolower($matches[1]);
        $data = base64_decode($matches[2], true);

        if ($data === false || strlen($data) > 5 * 1024 * 1024 || @getimagesizefromstring($data) === false) {
            throw ValidationException::withMessages(['photo_data' => 'The image must be valid and no larger than 5 MB.']);
        }

        $filename = "{$prefix}_" . time() . '_' . Str::random(8) . ".{$ext}";
        Storage::disk('public')->put("uploads/{$filename}", $data);

        return "storage/uploads/{$filename}";
    }
}