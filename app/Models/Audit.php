<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Audit extends Model implements \OwenIt\Auditing\Contracts\Audit
    {
        use \OwenIt\Auditing\Audit;

        /**
         * {@inheritdoc}
         */
        protected $guarded = [];

        /**
         * {@inheritdoc}
         */
        protected $casts = [
            'old_values' => 'json',
            'new_values' => 'json',
            // Note: Please do not add 'auditable_id' in here, as it will break non-integer PK models
        ];

        public function user()
        {
            return $this->belongsTo(User::class, 'user_id');
        }

        public function getCriadoEmAttribute()
        {
            return $this->created_at;
        }
    }
