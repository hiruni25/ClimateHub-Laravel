<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{protected $fillable = [
    'version_id',
    'category',
    'project_title',
    'energy_strategy',
    'bulding_scale',
    'climate_zone',
    'material',
    'parameters',
    'type_of_doc',
    'mode_of_info',
    'world_region',
    'topic',
    'accessible',
    'img_file',
    'project_file',
    'admin_id'
    ];
}
