<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    protected $fillable = [
        'created_by',
        'first_name',
        'last_name',
        'birth_name',
        'middle_names',
        'date_of_birth'
    ];

    protected $dates = ['date_of_birth'];

    public function children()
    {
        return $this->belongsToMany(Person::class, 'relationships', 'parent_id', 'child_id');
    }

    public function parents()
    {
        return $this->belongsToMany(Person::class, 'relationships', 'child_id', 'parent_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getDegreeWith($target_person_id)
    {
        $visited = [];
        $queue = [['id' => $this->id, 'degree' => 0]];
        
        while (!empty($queue)) {
            $current = array_shift($queue);
            
            if ($current['degree'] > 25) {
                return false;
            }
            
            if ($current['id'] == $target_person_id) {
                return $current['degree'];
            }
            
            if (!isset($visited[$current['id']])) {
                $visited[$current['id']] = true;
                
                // Récupérer les enfants et les parents en une seule requête
                $relations = DB::select("
                    SELECT parent_id as related_id FROM relationships WHERE child_id = ?
                    UNION
                    SELECT child_id as related_id FROM relationships WHERE parent_id = ?
                ", [$current['id'], $current['id']]);
                
                foreach ($relations as $relation) {
                    if (!isset($visited[$relation->related_id])) {
                        array_push($queue, ['id' => $relation->related_id, 'degree' => $current['degree'] + 1]);
                    }
                }
            }
        }
        
        return false;
    }
}