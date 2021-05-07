<?php

    namespace App\Models;

    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Support\Carbon;
    use OwenIt\Auditing\Contracts\Auditable;
    use OwenIt\Auditing\Models\Audit;

    /**
 * App\Models\Cargo
 *
 * @property int                                                   $id
 * @property string|null                                           $descricao
 * @method static Builder|Cargo newModelQuery()
 * @method static Builder|Cargo newQuery()
 * @method static Builder|Cargo query()
 * @mixin Eloquent
 * @property Carbon|null                       $created_at
 * @property Carbon|null                       $updated_at
 * @property Carbon|null                       $deleted_at
 * @property-read Collection|Audit[] $audits
 * @property-read int|null                                         $audits_count
 * @method static \Illuminate\Database\Query\Builder|Cargo onlyTrashed()
 * @method static Builder|Cargo whereCreatedAt($value)
 * @method static Builder|Cargo whereDeletedAt($value)
 * @method static Builder|Cargo whereDescricao($value)
 * @method static Builder|Cargo whereId($value)
 * @method static Builder|Cargo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Cargo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Cargo withoutTrashed()
 */
    class Cargo extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;
        protected $table      = 'cargos';
        protected $primaryKey = 'id';
        protected $fillable   = ['descricao'];


    }
