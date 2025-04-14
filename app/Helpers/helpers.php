<?php

use App\Models\GroupMember;
use App\Models\EventFixture;
use App\Models\OneToOneFixture;
use App\Models\Organization;
use App\Models\User;

use Illuminate\Support\Facades\DB;

if (!function_exists('prepareSchema')) {
    /**
     * Get players by sport name.
     *
     * @param string $sportName
     * @return \Illuminate\Support\Collection
     */
    function prepareSchema($settings, $schema)
    {
        $schema = str_replace('##Facebook_Link##',$settings['Facebook_Link'],$schema);
		$schema = str_replace('##Twitter_Link##',$settings['Twitter_Link'],$schema);
		$schema = str_replace('##Instagram_Link##',$settings['Instagram_Link'],$schema);
		$schema = str_replace('##Pinterest_Link##',$settings['Pinterest_Link'],$schema);
		$schema = str_replace('##Linkedin_Link##',$settings['Linkedin_Link'],$schema);
		$schema = str_replace('##logo##',$settings['logo'],$schema);
		$schema = str_replace('##url##',asset(''),$schema);
		$schema = str_replace('##Official_Number##',$settings['Official_Number'],$schema);
		$schema = str_replace('##Official_Address##',$settings['Office_Address'],$schema);
        return $schema;
    }
}
if(!function_exists('getVisitorCount')){
    function getVisitorCount(){
        $count = DB::table('visits')->count();
        if($count){
            return $count;
        }else{
            return 0;
        }
    }
}

