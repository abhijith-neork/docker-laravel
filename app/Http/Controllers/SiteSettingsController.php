<?php

namespace App\Http\Controllers;
use App\Models\SiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use Illuminate\Support\Facades\Crypt;

class SiteSettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the settings page.
     *
     */
    public function index()
    {
        // $settings = DB::table('site_settings')->get()->first(); 
        return view('admin.site_settings.index');
    }
    /**
     * Show the form for editing settings details.
     */
    public function edit(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        if($id=='' || $id==0)
        {
          $data['settings'] = SiteSettings::where('id',1)->get();
          $data['id']=0;
          $data['region']='Global';
        }
        else
        {
          $data['settings'] = SiteSettings::where('region',$id)->get();
          $data['id']=$id;
          $region = Region::where('id',$id)->get('region_name');
          $data['region']=$region[0]['region_name'];
        } 
 
        if(count($data['settings'])>0)
        {
           return view('admin.settings.editsettings', $data);
        }
        else
        {
           return view('admin.settings.addsettings',$data);
        }

       
        
    }

    /**
     * Function for updating site settings.
     */
    public function add(Request $request,$id)
    {

        //Validation added for required fields
        $validated = $request->validate([
            'site_title' => 'required|regex:/^[a-zA-Z0-9 \/\[\]}{?%*():;,_@&#.-]+$/u',
            'site_description' => 'required',
            'site_keywords' => 'required',
            'admin_email' => 'required|email',
            'facebook_url' => 'required',
            'youtube_url' =>'required',
            'google_url' =>'required'
        ],$messages = [
            'site_description.required' => 'The meta description field is required',
            'site_keywords.required'    => 'The meta keywords field is required'
        ]);
        $settings = new SiteSettings;
        $settings->site_title = $request->site_title;
        $settings->site_description   = $request->site_description;
        $settings->site_keywords   = $request->site_keywords;
        $settings->admin_email   = $request->admin_email;
        $settings->pagination_limit   = 10;
        $settings->facebook_url   = $request->facebook_url;
        $settings->youtube_url   = $request->youtube_url;
        $settings->google_url   = $request->google_url;
        $settings->region = $id;
        $settings->save();
        $id = Crypt::encrypt($settings->region);
        return redirect('edit-settings/'.$id)->with('message', 'Successfully updated.');
    }


    /**
     * Function for updating site settings.
     */
    public function update(Request $request, $id)
    {
        //Validation added for required fields
        $validated = $request->validate([
            'site_title' => 'required|regex:/^[a-zA-Z0-9 \/\[\]}{?%*():;,_@&#.-]+$/u',
            'site_description' => 'required',
            'site_keywords' => 'required',
            'admin_email' => 'required|email',
            'facebook_url' => 'required',
            'youtube_url' =>'required',
            'google_url' =>'required'
        ],$messages = [
            'site_description.required' => 'The meta description field is required',
            'site_keywords.required'    => 'The meta keywords field is required'
        ]);

        if($id==''|| $id==0)
        {
            $settings = SiteSettings::find('1');
        }
        else
        {
            $settings_id = SiteSettings::where('region',$id)->get('id'); //print_r($settings_id[0]['id']);exit();
            $settings = SiteSettings::find($settings_id[0]['id']);
        }
       //print_r($settings);exit();

        $settings->site_title = $request->site_title;
        $settings->site_description   = $request->site_description;
        $settings->site_keywords   = $request->site_keywords;
        $settings->admin_email   = $request->admin_email;
        $settings->pagination_limit   = 10;
        $settings->facebook_url   = $request->facebook_url;
        $settings->youtube_url   = $request->youtube_url;
        $settings->google_url   = $request->google_url;
        $settings->region = $id;
        $settings->update();
        $id = Crypt::encrypt($settings->region);
        return redirect('edit-settings/'.$id)->with('message', 'Successfully updated.');
    }
}
