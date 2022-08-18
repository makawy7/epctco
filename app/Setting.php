<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable=['co_name','co_name_ar','sitename','sitename_ar','sitetitle','sitetitle_ar','sitedes','sitedes_ar','icon','logo',
    'home_image','home_content','home_content_ar','about_image','about_content',
    'about_content_ar','about_vision','about_vision_ar','about_mission','about_mission_ar',
    'adminoffice_address','adminoffice_address_ar','adminoffice_phone','adminoffice_email',
    'mainstore_address','mainstore_address_ar','mainstore_phone','mainstore_email',
    'contactinfo_des','contactinfo_des_ar','contactinfo_address','contactinfo_address_ar','contactinfo_phone','contactinfo_email',
    'facebook','instagram','twitter','linkedin','pinterest','lat','lng'];


    public function coname(){
      return app()->getLocale()=='ar'?$this->co_name_ar:$this->co_name;
    }
    public function homecontent(){
      return app()->getLocale()=='ar'?$this->home_content_ar:$this->home_content;
    }
    public function getsitename(){
      return app()->getLocale()=='ar'?$this->sitename_ar:$this->sitename;
    }
    public function getsitetitle(){
      return app()->getLocale()=='ar'?$this->sitetitle_ar:$this->sitetitle;
    }
    public function aboutcontent(){
      return app()->getLocale()=='ar'?$this->about_content_ar:$this->about_content;
    }
    public function vision(){
      return app()->getLocale()=='ar'?$this->about_vision_ar:$this->about_vision;
    }
    public function mission(){
      return app()->getLocale()=='ar'?$this->about_mission_ar:$this->about_mission;
    }
    public function adminofficeaddress(){
      return app()->getLocale()=='ar'?$this->adminoffice_address_ar:$this->adminoffice_address;
    }
    public function mainstoreaddress(){
      return app()->getLocale()=='ar'?$this->mainstore_address_ar:$this->mainstore_address;
    }
    public function contactinfodes(){
      return app()->getLocale()=='ar'?$this->contactinfo_des_ar:$this->contactinfo_des;
    }
    public function contactinfoaddress(){
      return app()->getLocale()=='ar'?$this->contactinfo_address_ar:$this->contactinfo_address;
    }
}
