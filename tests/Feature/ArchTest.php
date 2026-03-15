<?php

arch('model extends basic model')
    ->expect('App\Models')
    ->toExtend(Illuminate\Database\Eloquent\Model::class);
