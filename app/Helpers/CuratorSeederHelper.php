<?php

namespace App\Helpers;

use Awcodes\Curator\Models\Media;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CuratorSeederHelper
{

    public static function resolveFileData(string $filePath): Media
    {
        if (!is_file($filePath)) {
            throw new Exception("No file found in path: " . $filePath);
        }

        // Extract file extension safely
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $originalFilename = pathinfo($filePath, PATHINFO_BASENAME);

        $media = Media::where('title', $originalFilename)
            ->where('description', $filePath)
            ->first();

            if(!is_null($media)){
                return $media;
            }

        if (!$extension) {
            throw new Exception("File extension could not be identified: " . $filePath);
        }

        // Generate unique filename
        $uuid = Str::uuid();
        $filename = "{$uuid}.{$extension}";
        $storagePath = "media/{$filename}";

        // Store the file in Laravel's storage (ensures correct permissions)
        Storage::disk('public')->put($storagePath, file_get_contents($filePath));

        // Get file details efficiently
        $mimeType = mime_content_type($filePath) ?: null;
        $fileSize = filesize($filePath) ?: null;
        $imageData = @getimagesize($filePath);
        $exifData = null;
        if( stripos($mimeType, 'image') === 0 ){
            $exifData = @exif_read_data($filePath) ?? null;
            if(!is_null($exifData)){
                $exifData = mb_convert_encoding($exifData, 'UTF-8', 'UTF-8');
            }
        }

        $mediaData = [
            'disk' => 'public',
            'directory' => 'media',
            'visibility' => 'public',
            'name' => $uuid,
            'title' => $originalFilename,
            'description' => $filePath,
            'path' => $storagePath,
            'width' => $imageData[0] ?? null,
            'height' => $imageData[1] ?? null,
            'size' => $fileSize,
            'type' => $mimeType,
            'ext' => $extension,
            'exif' => $exifData,
        ];

        try {
            return Media::create($mediaData);
        }
        catch (Exception $e) {
            dd("Exception", $mediaData['exif'], $e);
        }
    }

    public static function seedBelongsTo(Model $related, string $relatedField, string|Media $filePath): Media
    {

        if ($filePath instanceof Media) {
            $media = $filePath;
        } else {
            $media = self::resolveFileData($filePath);
        }

        $related->update([
            $relatedField => $media->id
        ]);


        return $media;
    }

    public static function seedBelongsToMany(Model $related, string $relatedName, string|Media $filePath, array $attributes = []): Media
    {
        $media = null;
        if ($filePath instanceof Media) {
            $media = $filePath;
        } else {
            $media = self::resolveFileData($filePath);
        }

        $related->{$relatedName}()->attach($media, $attributes);

        return $media;
    }

    public static function clearStorage()
    {
        File::deleteDirectory(public_path('storage/media'), false);
    }
}
