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
 * App\Models\Vacina
 *
 * @property int                             $id
 * @property string|null                     $descricao
 * @method static Builder|Cargo newModelQuery()
 * @method static Builder|Cargo newQuery()
 * @method static Builder|Cargo query()
 * @mixin Eloquent
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection|Audit[]         $audits
 * @property-read int|null                   $audits_count
 * @property-read Collection|Lote[]          $lotes
 * @property-read int|null                   $lotes_count
 * @method static \Illuminate\Database\Query\Builder|Vacina onlyTrashed()
 * @method static Builder|Vacina whereCreatedAt($value)
 * @method static Builder|Vacina whereDeletedAt($value)
 * @method static Builder|Vacina whereDescricao($value)
 * @method static Builder|Vacina whereId($value)
 * @method static Builder|Vacina whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Vacina withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Vacina withoutTrashed()
 */
    class Vacina extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;
        protected $table      = 'vacinas';
        protected $primaryKey = 'id';
        protected $fillable   = ['descricao'];

        public function lotes()
        {
            return $this->hasMany(Lote::class, 'vacina_id', 'id');

        }


    }
