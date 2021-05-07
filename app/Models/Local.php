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
 * App\Models\Local
 *
 * @property int                                  $id
 * @property string|null                          $descricao
 * @method static Builder|Local newModelQuery()
 * @method static Builder|Local newQuery()
 * @method static Builder|Local query()
 * @mixin Eloquent
 * @property Carbon|null                          $created_at
 * @property Carbon|null                          $updated_at
 * @property Carbon|null                          $deleted_at
 * @property-read Collection|Audit[]              $audits
 * @property-read int|null                        $audits_count
 * @method static \Illuminate\Database\Query\Builder|Local onlyTrashed()
 * @method static Builder|Local whereCreatedAt($value)
 * @method static Builder|Local whereDeletedAt($value)
 * @method static Builder|Local whereDescricao($value)
 * @method static Builder|Local whereId($value)
 * @method static Builder|Local whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Local withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Local withoutTrashed()
 * @property string|null                          $endereco
 * @method static Builder|Local whereEndereco($value)
 * @property-read mixed                           $total_vagas
 * @property-read mixed                           $total_vagas_preenchidas
 * @property-read Collection|\App\Models\Agenda[] $listaAgendasDisponiveis
 * @property-read int|null                        $lista_agendas_disponiveis_count
 */
    class Local extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;

        protected $table      = 'locais';
        protected $primaryKey = 'id';
        protected $fillable   = ['descricao', 'endereco'];

        public function getTotalVagasAttribute()
        {
            return $this->hasMany(Agenda::class, 'local_id', 'id')->where('data', '>', now())->where('habilitado', 1)->sum('quantidade');
        }

        public function getTotalVagasPreenchidasAttribute()
        {
            return $this->hasManyThrough(Agendado::class, Agenda::class, 'local_id', 'agenda_id', 'id', 'id')
                        ->where('agendas.data', '>', now())
                        ->where('habilitado', 1)
                        ->count();
        }

        public function listaAgendasDisponiveis()
        {
            return $this->hasMany(Agenda::class, 'local_id', 'id')->where('data', '>', now())->where('habilitado', 1)->orderBy('data');
        }
    }
