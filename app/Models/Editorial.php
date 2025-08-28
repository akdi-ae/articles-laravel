<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * @property int $id
 * @property int $user_id
 * @property string|null $title_kk
 * @property string|null $title_ru
 * @property string|null $title_en
 * @property string|null $author_kk
 * @property string|null $author_ru
 * @property string|null $author_en
 * @property string|null $content
 * @property string $status
 * @property string|null $file_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $author
 * @property-read mixed $title
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereAuthorEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereAuthorKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereAuthorRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereTitleEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereTitleKk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereTitleRu($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Editorial whereUserId($value)
 * @mixin \Eloquent
 */
class Editorial extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_kk', 'title_ru', 'title_en',
        'author_kk', 'author_ru', 'author_en',
        'content', 'file_path'
    ];
    public function getTitleAttribute()
    {
        $locale = app()->getLocale(); // например 'kk', 'ru' или 'en'
        return $this->{"title_$locale"} ?? $this->title_kk;
    }

    public function getAuthorAttribute()
    {
        $locale = app()->getLocale();
        return $this->{"author_$locale"} ?? $this->author_kk;
    }
public function getContentAttribute()
{
    $locale = app()->getLocale();
    return $this->{"content_{$locale}"} ?? $this->content_kk;
}
public function user()
{
    return $this->belongsTo(User::class);
}
}
