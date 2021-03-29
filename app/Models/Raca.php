<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use OwenIt\Auditing\Contracts\Auditable;


    /**
 * App\Models\Raca
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @method static \Illuminate\Database\Eloquent\Builder|Raca newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Raca newQuery()
 * @method static \Illuminate\Database\Query\Builder|Raca onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Raca query()
 * @method static \Illuminate\Database\Eloquent\Builder|Raca whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raca whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raca whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raca whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Raca whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Raca withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Raca withoutTrashed()
 * @mixin \Eloquent
 */
class Raca extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;
        protected $table      = 'racas';
        protected $primaryKey = 'id';
        protected $fillable   = ['descricao'];


    }
