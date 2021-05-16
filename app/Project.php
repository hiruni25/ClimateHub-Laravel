<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{protected $fillable = [
    'version_id',
    'project_title',
    'author',
    'organisation',
    'abstract',
    'category',
    'energy_strategy',
    'bulding_scale',
    'climate_zone',
    'material',
    'parameters',
    'type_of_doc',
    'mode_of_info',
    'topic',
    'world_region',
    'longitude',
    'latitude',
    'project_file',
    'img_file',
    'accessible',
    'admin_id'
    ];
}
