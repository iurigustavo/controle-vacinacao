<?php


    namespace App\Models;


    use Eloquent;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;


    /**
 * App\Models\Pessoa
 *
 * @property int            $id
 * @property string|null    $nome
 * @property string|null    $cpf
 * @property string|null    $sexo
 * @property string|null    $data_nascimento
 * @property string|null    $idade
 * @property string|null    $v1_data
 * @property string|null    $v1_cargo
 * @property string|null    $v1_local
 * @property string|null    $v2_data
 * @property string|null    $v2_cargo
 * @property string|null    $v2_local
 * @method static Builder|Pessoa newModelQuery()
 * @method static Builder|Pessoa newQuery()
 * @method static Builder|Pessoa query()
 * @mixin Eloquent
 * @method static Builder|viewPessoasVacinacao whereCpf($value)
 * @method static Builder|viewPessoasVacinacao whereDataNascimento($value)
 * @method static Builder|viewPessoasVacinacao whereId($value)
 * @method static Builder|viewPessoasVacinacao whereIdade($value)
 * @method static Builder|viewPessoasVacinacao whereNome($value)
 * @method static Builder|viewPessoasVacinacao whereSexo($value)
 * @method static Builder|viewPessoasVacinacao whereV1Cargo($value)
 * @method static Builder|viewPessoasVacinacao whereV1Data($value)
 * @method static Builder|viewPessoasVacinacao whereV1Local($value)
 * @method static Builder|viewPessoasVacinacao whereV2Cargo($value)
 * @method static Builder|viewPessoasVacinacao whereV2Data($value)
 * @method static Builder|viewPessoasVacinacao whereV2Local($value)
 */
    class viewPessoasVacinacao extends Model
    {
        protected $table      = 'uvw_pessoas_vacinacao';
        protected $primaryKey = 'id';
        public    $timestamps = FALSE;
    }