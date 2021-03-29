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
 * App\Models\Vacinacao
 *
 * @property int                                                   $id
 * @property string|null                                           $data
 * @property string|null                                           $observacao
 * @property string|null                                           $pessoa_id
 * @property string|null                                           $dose_id
 * @property string|null                                           $cargo_id
 * @property string|null                                           $local_id
 * @method static Builder|Vacinacao newModelQuery()
 * @method static Builder|Vacinacao newQuery()
 * @method static Builder|Vacinacao query()
 * @mixin Eloquent
 * @property Carbon|null                       $created_at
 * @property Carbon|null                       $updated_at
 * @property Carbon|null                       $deleted_at
 * @property-read Collection|Audit[] $audits
 * @property-read int|null                                         $audits_count
 * @method static \Illuminate\Database\Query\Builder|Vacinacao onlyTrashed()
 * @method static Builder|Vacinacao whereCargoId($value)
 * @method static Builder|Vacinacao whereCreatedAt($value)
 * @method static Builder|Vacinacao whereData($value)
 * @method static Builder|Vacinacao whereDeletedAt($value)
 * @method static Builder|Vacinacao whereDoseId($value)
 * @method static Builder|Vacinacao whereId($value)
 * @method static Builder|Vacinacao whereLocalId($value)
 * @method static Builder|Vacinacao whereObservacao($value)
 * @method static Builder|Vacinacao wherePessoaId($value)
 * @method static Builder|Vacinacao whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Vacinacao withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Vacinacao withoutTrashed()
 * @property int|null                                                                      $lote_id
 * @method static Builder|Vacinacao whereLoteId($value)
 */
    class Vacinacao extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;
        protected $table      = 'vacinacoes';
        protected $primaryKey = 'id';
        protected $fillable   = ['data', 'observacao', 'pessoa_id', 'dose_id', 'cargo_id', 'local_id', 'lote_id'];


    }
