<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    
    public const SESSION_VAR = 'visit';
    
    
    protected $table = 'visits';
    
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function visitStages()
    {
        return $this->hasMany(VisitStage::class);
    }
    
    public function hasPassed($stageName)
    {
        $stages = $this->visitStages()->getResults();
        if ($stages->count() > 0) {
            $forStage = $stages->filter(function (VisitStage $visitStage) use ($stageName){
                return $visitStage->stage_name == $stageName;
            });
            return $forStage->count() > 0;
        }
        
        return false;
    }

    public function hasPassedAny($visitStages)
    {

        if (\is_array($visitStages)) {
            $stages = $this->visitStages()->getResults();

            foreach($visitStages as $stageName) {
                $forStage = $stages->filter(function (VisitStage $visitStage) use ($stageName){
                    return $visitStage->stage_name == $stageName;
                });
                if ($forStage->count() > 0) {
                    return true;
                }
            }
            return false;
        }

        return $this->hasPassed($visitStages);
    }
    
    public function removeStages($stages)
    {
        if (\is_array($stages)) {
            $this->visitStages->each(function($stage) use ($stages){
                if (\in_array($stage->stage_name, $stages, true)) {
                    $stage->delete();
                }
            });
        }
    }
    
}
