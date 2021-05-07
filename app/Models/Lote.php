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
 * App\Models\Lote
 *
 * @property int                     $id
 * @property string|null             $descricao
 * @property int|null                $quantidade
 * @property int|null                $vacina_id
 * @property string|null             $data_vencimento
 * @method static Builder|Cargo newModelQuery()
 * @method static Builder|Cargo newQuery()
 * @method static Builder|Cargo query()
 * @mixin Eloquent
 * @property Carbon|null             $created_at
 * @property Carbon|null             $updated_at
 * @property Carbon|null             $deleted_at
 * @property-read Collection|Audit[] $audits
 * @property-read int|null           $audits_count
 * @method static \Illuminate\Database\Query\Builder|Lote onlyTrashed()
 * @method static Builder|Lote whereCreatedAt($value)
 * @method static Builder|Lote whereDeletedAt($value)
 * @method static Builder|Lote whereDescricao($value)
 * @method static Builder|Lote whereId($value)
 * @method static Builder|Lote whereQuantidade($value)
 * @method static Builder|Lote whereUpdatedAt($value)
 * @method static Builder|Lote whereVacinaId($value)
 * @method static \Illuminate\Database\Query\Builder|Lote withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Lote withoutTrashed()
 * @property-read Vacina             $vacina
 * @method static Builder|Lote whereDataVencimento($value)
 */
    class Lote extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;
        protected $table      = 'lotes';
        protected $primaryKey = 'id';
        protected $fillable   = ['descricao', 'quantidade', 'vacina_id', 'data_vencimento'];

        public function vacina()
        {
            return $this->belongsTo(Vacina::class, 'vacina_id', 'id');
        }


    }
