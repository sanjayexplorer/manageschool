<?php
namespace App\Helpers;
use App\Models\User;
use App\Models\ClassModel;
use App\Models\Section;
class CommonHelper
{
 
    public static function getSectionById($sectionId)
    {
        $section = Section::where('id', $sectionId)->first();
    
        if ($section) {
            return $section->name;
        }
    
        return null;
    }

    public static function getClassById($classId){
        $section = ClassModel::where('id', $classId)->first();
    
        if ($section) {
            return $section->name;
        }
    
        return null;
    }
}
    
