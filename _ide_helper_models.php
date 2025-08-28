<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Editorial extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Journal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Journal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Journal query()
 */
	class Journal extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $role
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Article> $articles
 * @property-read int|null $articles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Editorial> $editorials
 * @property-read int|null $editorials_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

