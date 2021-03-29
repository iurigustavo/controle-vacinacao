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
     */
    class viewPessoasVacinacao extends Model
    {
        protected $table      = 'uvw_pessoas_vacinacao';
        protected $primaryKey = 'id';
        public    $timestamps = FALSE;
    }