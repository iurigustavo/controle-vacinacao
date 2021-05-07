<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Database\Query\Builder;

    /**
 * App\Models\Agendado
 *
 * @property int                             $id
 * @property int                             $compareceu
 * @property int                             $pessoa_id
 * @property int                             $agenda_id
 * @property int                             $local_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado newQuery()
 * @method static Builder|Agendado onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereAgendaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereCompareceu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereUpdatedAt($value)
 * @method static Builder|Agendado withTrashed()
 * @method static Builder|Agendado withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\Agenda         $agenda
 * @property-read \App\Models\Local          $local
 * @property-read \App\Models\Pessoa         $pessoa
 * @property string|null                     $data
 * @method static \Illuminate\Database\Eloquent\Builder|Agendado whereData($value)
 */
    class Agendado extends Model
    {
        use SoftDeletes;

        protected $table    = 'agendados';
        protected $fillable = ['compareceu', 'pessoa_id', 'agenda_id', 'local_id', 'data'];

        public function local()
        {
            return $this->belongsTo(Local::class, 'local_id', 'id');
        }

        public function pessoa()
        {
            return $this->belongsTo(Pessoa::class, 'pessoa_id', 'id');
        }

        public function agenda()
        {
            return $this->belongsTo(Agenda::class, 'agenda_id', 'id');
        }
    }
