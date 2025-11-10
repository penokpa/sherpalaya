<?php
namespace App\Helpers;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CuratorMigrationHelper
{
    public static function migratePivotTable(
        string $table,
        string $relatedId,
        string $mediaId = 'media_id',
        bool $isOrderable = true
    ) {
        Schema::create($table, function (Blueprint $table) use ($relatedId, $mediaId, $isOrderable) {
            $table->id();
            $table->foreignId($relatedId);
            $table->foreignIdFor(Media::class, $mediaId);
            if ($isOrderable) {
                $table->integer('order')
                    ->default(0);
            }
            $table->timestamps();
        });
    }

    public static function rollbackPivotTable(string $table){
        Schema::dropIfExists($table);
    }

    public static function migrateMediaField(string $table, string $mediaId = 'media_id', bool $nullable = true){
        Schema::table($table, function (Blueprint $table) use ($mediaId, $nullable) {
            if($nullable){
                $table->foreignIdFor(Media::class, $mediaId)
                ->nullable()
                ->default(null);
            }else{
                $table->foreignIdFor(Media::class, $mediaId);
            }

        });
    }

    public static function rollbackMediaField(string $table, string $mediaId = 'media_id'){
        Schema::table($table, function (Blueprint $table) use ($mediaId) {
            $table->dropColumn([
                $mediaId,
            ]);
        });
    }
}
