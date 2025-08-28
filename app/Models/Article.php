<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property string $file_path
 * @property string $original_name
 * @property string|null $mime_type
 * @property int|null $file_size
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Article whereUserId($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    protected $fillable = [
        'user_id',
        'file_path',
        'original_name',
        'mime_type',
        'file_size',
    ];
}
