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
     * App\Models\Pessoa
     *
     * @property int                                    $id
     * @property string                                 $nome
     * @property string                                 $cpf
     * @property string                                 $sexo
     * @property string|null                            $cns
     * @property string                                 $data_nascimento
     * @property string                                 $telefone
     * @property string|null                            $end_rua
     * @property string|null                            $end_numero
     * @property string|null                            $end_bairro
     * @property string|null                            $end_cep
     * @property string|null                            $end_cidade
     * @property string|null                            $end_uf
     * @property int                                    $raca_id
     * @property Carbon|null                            $created_at
     * @property Carbon|null                            $updated_at
     * @property Carbon|null                            $deleted_at
     * @property-read Collection|Audit[]                $audits
     * @property-read int|null                          $audits_count
     * @method static Builder|Pessoa newModelQuery()
     * @method static Builder|Pessoa newQuery()
     * @method static \Illuminate\Database\Query\Builder|Pessoa onlyTrashed()
     * @method static Builder|Pessoa query()
     * @method static Builder|Pessoa whereCns($value)
     * @method static Builder|Pessoa whereCpf($value)
     * @method static Builder|Pessoa whereCreatedAt($value)
     * @method static Builder|Pessoa whereDataNascimento($value)
     * @method static Builder|Pessoa whereDeletedAt($value)
     * @method static Builder|Pessoa whereEndBairro($value)
     * @method static Builder|Pessoa whereEndCep($value)
     * @method static Builder|Pessoa whereEndCidade($value)
     * @method static Builder|Pessoa whereEndNumero($value)
     * @method static Builder|Pessoa whereEndRua($value)
     * @method static Builder|Pessoa whereEndUf($value)
     * @method static Builder|Pessoa whereId($value)
     * @method static Builder|Pessoa whereNome($value)
     * @method static Builder|Pessoa whereRacaId($value)
     * @method static Builder|Pessoa whereSexo($value)
     * @method static Builder|Pessoa whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|Pessoa withTrashed()
     * @method static \Illuminate\Database\Query\Builder|Pessoa withoutTrashed()
     * @property-read Raca                              $raca
     * @mixin Eloquent
     * @method static Builder|Pessoa whereTelefone($value)
     * @property-read Collection|\App\Models\Agendado[] $agendamentos
     * @property-read int|null                          $agendamentos_count
     */
    class Pessoa extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;

        protected $table      = 'pessoas';
        protected $primaryKey = 'id';
        protected $fillable   = ['nome', 'cpf', 'sexo', 'cns', 'data_nascimento', 'telefone', 'end_rua', 'end_numero', 'end_bairro', 'end_cep', 'end_cidade', 'end_uf', 'raca_id'];

        public function raca()
        {
            return $this->belongsTo(Raca::class, 'raca_id', 'id');
        }

        /**
         * @param $dose_id
         *
         * @return Vacinacao|Builder|Model
         */
        public function doseAplicada($dose_id)
        {
            return Vacinacao::firstOrNew([
                'pessoa_id' => $this->id,
                'dose_id'   => $dose_id,
            ]);
        }

        public function agendamentos()
        {
            return $this->hasMany(Agendado::class, 'pessoa_id', 'id');
        }

        public function temAgendamentoPraData($data)
        {
            return Agendado::where('pessoa_id', $this->id)->where('data', $data)->exists();
        }

        public function getIdade()
        {
            return Carbon::parse($this->data_nascimento)->age;
        }

    }
