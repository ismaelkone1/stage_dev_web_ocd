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

    protected $dates = ['date_of_birth' => 'datetime'];

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
        $queue = new \SplQueue();
        $queue->enqueue(['id' => $this->id, 'degree' => 0]);

        while (!$queue->isEmpty()) {
            $current = $queue->dequeue();
            $current_id = $current['id'];
            $current_degree = $current['degree'];

        
            if ($current_id == $target_person_id) {
                return $current_degree;
            }

            if ($current_degree >= 25) {
                return false;
            }

            if (isset($visited[$current_id])) {
                continue;
            }

            $visited[$current_id] = true;

            // Récupérer les personnes liées à la personne courante
            $relationships = DB::select("
                SELECT parent_id as related_id FROM relationships WHERE child_id = :id1
                UNION 
                SELECT child_id as related_id FROM relationships WHERE parent_id = :id2
            ", ['id1' => $current_id, 'id2' => $current_id]);

            // Ajout des personnes liées à la file d'attente
            foreach ($relationships as $rel) {
                if (!isset($visited[$rel->related_id])) {
                    $queue->enqueue([
                        'id' => $rel->related_id,
                        'degree' => $current_degree + 1
                    ]);
                }
            }
        }

        return false;
    }
}