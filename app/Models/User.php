<?php

    namespace App\Models;

    use Eloquent;
    use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\DatabaseNotification;
    use Illuminate\Notifications\DatabaseNotificationCollection;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Support\Carbon;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\Traits\HasRoles;

    /**
 * App\Models\User
 *
 * @property int                                                                                  $id
 * @property string                                                                               $name
 * @property string                                                                               $email
 * @property Carbon|null                                                      $email_verified_at
 * @property string                                                                               $password
 * @property string|null                                                                          $remember_token
 * @property boolean                                                                              $enabled
 * @property Carbon|null                                                      $created_at
 * @property Carbon|null                                                      $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null                                                                        $notifications_count
 * @property-read Collection|Permission[]                                                         $permissions
 * @property-read int|null                                                                        $permissions_count
 * @property-read Collection|Role[]                                                               $roles
 * @property-read int|null                                                                        $roles_count
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = NULL)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static Builder|User whereEnabled($value)
 */
    class User extends Authenticatable
    {
        use HasRoles, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name',
            'email',
            'password',
            'enabled'
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * The attributes that should be cast to native types.
         *
         * @var array
         */
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];
    }
