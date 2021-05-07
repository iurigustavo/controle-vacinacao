<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Database\Query\Builder;

    /**
 * App\Models\Agenda
 *
 * @property int                             $id
 * @property string                          $data
 * @property string                          $periodo
 * @property int                             $quantidade
 * @property int|null                        $faixa_etaria_min
 * @property int|null                        $faixa_etaria_max
 * @property int                             $habilitado
 * @property int                             $local_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda newQuery()
 * @method static Builder|Agenda onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereFaixaEtariaMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereFaixaEtariaMin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereHabilitado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda wherePeriodo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereQuantidade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda whereUpdatedAt($value)
 * @method static Builder|Agenda withTrashed()
 * @method static Builder|Agenda withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\Local          $local
 * @method static \Illuminate\Database\Eloquent\Builder|Agenda ativo()
 * @property-read bool                       $tem_vaga
 * @property-read mixed $total_vagas
 * @property-read mixed $total_vagas_preenchidas
 */
    class Agenda extends Model
    {
        use SoftDeletes;

        protected $table    = 'agendas';
        protected $fillable = ['data', 'periodo', 'quantidade', 'faixa_etaria_min', 'faixa_etaria_max', 'habilitado', 'local_id'];


        public function local()
        {
            return $this->belongsTo(Local::class, 'local_id', 'id');
        }

        public function scopeAtivo($query)
        {
            return $query->where('data', '>', now())->where('habilitado', 1);
        }

        public function podeAgendar(): bool
        {
            return Agenda::ativo()->exists();
        }

        public function getTemVagaAttribute(): bool
        {
            if ((Agenda::ativo()->where('id', $this->id)->sum('quantidade') - Agendado::where('agenda_id', $this->id)->count()) > 0) {
                return TRUE;
            }
            return FALSE;
        }

        public function getTotalVagasAttribute()
        {
            return $this->where('id', $this->id)->ativo()->sum('quantidade');
        }

        public function getTotalVagasPreenchidasAttribute()
        {
            return $this->hasMany(Agendado::class,'agenda_id','id')->count();
        }

        public function listaLocalidadesDisponiveis()
        {
            $locais = Agenda::ativo()->distinct()->pluck('local_id', 'local_id');
            return Local::whereIn('id', $locais)->get();
        }

    }
