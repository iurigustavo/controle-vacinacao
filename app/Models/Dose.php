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
     * App\Models\Doses
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
     * @method static \Illuminate\Database\Query\Builder|Dose onlyTrashed()
     * @method static Builder|Dose whereCreatedAt($value)
     * @method static Builder|Dose whereDeletedAt($value)
     * @method static Builder|Dose whereDescricao($value)
     * @method static Builder|Dose whereId($value)
     * @method static Builder|Dose whereUpdatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|Dose withTrashed()
     * @method static \Illuminate\Database\Query\Builder|Dose withoutTrashed()
     */
    class Dose extends Model implements Auditable
    {
        use \OwenIt\Auditing\Auditable;
        use SoftDeletes;
        protected $table      = 'doses';
        protected $primaryKey = 'id';
        protected $fillable   = ['descricao'];


    }
