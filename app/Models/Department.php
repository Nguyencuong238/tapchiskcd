<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class Department extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }


    public function showUrl()
    {
        return route('front.department.show', ['id' => $this->id, 'slug' => $this->slug]);
    }

    public function registerMediaCollections(Media $media = null): void
    {
        $this
        ->addMediaCollection('media')
        ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();

        $this
            ->addMediaConversion('show')
            ->fit(Manipulations::FIT_CROP, 310, 300)
            ->format('webp')
            ->nonQueued();

        $this
            ->addMediaConversion('show-bf')
            ->fit(Manipulations::FIT_CROP, 315, 200)
            ->format('webp')
            ->nonQueued();
    }
}
