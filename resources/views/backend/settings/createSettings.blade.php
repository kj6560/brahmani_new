@extends('layouts.dashboard')
@section('content')
<style>
  .exp_text {
    width: 100%;
    /* Full width of the parent container */
    max-width: 100%;
    /* Prevent exceeding the container */
    min-width: 100%;
    /* Prevent shrinking smaller than the container */
    min-height: 50px;
    /* Ensure a reasonable minimum height */
    resize: both;
    /* Allow manual resizing */
    overflow: auto;
    /* Ensure scrollbar if content exceeds height */
  }
</style>
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-11 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">General Settings</h4>
          @include('backend.errors.formErrors')
          <form method="POST" action="/admin/storeSiteSettings" enctype="multipart/form-data" class="forms-sample">
            @csrf
            <div class="row" style="background-color:grey;">
              <label for="exampleInputUsername1" style="color:white;">Office Details</label>
            </div>
            <div class="col" style="margin: 20px;">
              <div class="form-group">
                <label for="exampleInputUsername1">Company Name</label>
                <input type="text" name="Company_Name"
                  value="{{!empty($setting) && $settings['Company_Name'] ? $settings['Company_Name'] : old('Company_Name')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Office Address</label>
                <input type="text" name="Office_Address"
                  value="{{!empty($settings) && $settings['Office_Address'] ? $settings['Office_Address'] : old('Office_Address')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Office Number</label>
                <input type="text" name="Official_Number"
                  value="{{!empty($settings) && $settings['Official_Number'] ? $settings['Official_Number'] : old('Official_Number')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Office Number vadodara</label>
                <input type="text" name="Official_Number_Vadodara"
                  value="{{!empty($settings) && $settings['Official_Number_Vadodara'] ? $settings['Official_Number_Vadodara'] : old('Official_Number_Vadodara')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Office Number Merut</label>
                <input type="text" name="Official_Number_Merut"
                  value="{{!empty($settings) && $settings['Official_Number_Merut'] ? $settings['Official_Number_Merut'] : old('Official_Number_Merut')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Office Email</label>
                <input type="text" name="Official_Email"
                  value="{{!empty($settings) && $settings['Official_Email'] ? $settings['Official_Email'] : old('Official_Email')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Location Merut</label>
                <input type="text" name="meerut_location"
                  value="{{!empty($settings) && $settings['meerut_location'] ? $settings['meerut_location'] : old('meerut_location')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Location Vadodara</label>
                <input type="text" name="vadodara_location"
                  value="{{!empty($settings) && $settings['vadodara_location'] ? $settings['vadodara_location'] : old('vadodara_location')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Address Merut</label>
                <input type="text" name="meerut_address"
                  value="{{!empty($settings) && $settings['meerut_address'] ? $settings['meerut_address'] : old('meerut_address')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Address Vadodara</label>
                <input type="text" name="vadodara_address"
                  value="{{!empty($settings) && $settings['vadodara_address'] ? $settings['vadodara_address'] : old('vadodara_address')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

            </div>
            <div class="row" style="background-color:grey;">
              <label for="exampleInputUsername1" style="color:white;">Social Media Links</label>
            </div>

            <div class="col" style="margin: 20px;">
              <div class="form-group">
                <label for="exampleInputUsername1">Facebook Link</label>
                <input type="text" name="Facebook_Link"
                  value="{{!empty($settings) && $settings['Facebook_Link'] ? $settings['Facebook_Link'] : old('Facebook_Link')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Instagram Link</label>
                <input type="text" name="Instagram_Link"
                  value="{{!empty($settings) && $settings['Instagram_Link'] ? $settings['Instagram_Link'] : old('Instagram_Link')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Twitter Link</label>
                <input type="text" name="Twitter_Link"
                  value="{{!empty($settings) && $settings['Twitter_Link'] ? $settings['Twitter_Link'] : old('Twitter_Link')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Pinterest Link</label>
                <input type="text" name="Pinterest_Link"
                  value="{{!empty($settings) && $settings['Pinterest_Link'] ? $settings['Pinterest_Link'] : old('Pinterest_Link')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>

              <div class="form-group">
                <label for="exampleInputUsername1">Linkedin Link</label>
                <input type="text" name="Linkedin_Link"
                  value="{{!empty($settings) && $settings['Linkedin_Link'] ? $settings['Linkedin_Link'] : old('Linkedin_Link')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
            </div>
            <div class="row" style="background-color:grey;">
              <label for="exampleInputUsername1" style="color:white;">Other Settings</label>
            </div>

            <div class="col" style="margin: 20px;">
              <div class="form-group">
                <label for="exampleInputUsername1">Website Logo</label>
                <input type="file" class="form-control file-upload-info" name="logo" placeholder="Upload Image">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Youtube Homepage Link</label>
                <input type="text" name="youtube_link_homepage"
                  value="{{!empty($settings) && $settings['youtube_link_homepage'] ? $settings['youtube_link_homepage'] : old('youtube_link_homepage')}}"
                  class="form-control" id="exampleInputUsername1">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">GTag</label>
                <textarea class="exp_text" name="gtag" rows="12"
                  id="gtag">{{!empty($settings) && $settings['gtag'] ? $settings['gtag'] : old('gtag')}}</textarea>
              </div>
            </div>
            <div class="row" style="background-color:grey;">
              <label for="exampleInputUsername1" style="color:white;">Homepage Settings</label>
            </div>

            <div class="col" style="margin: 20px;">
              <div class="form-group">
                <label for="exampleInputUsername1">Building Excellence, Together</label>
                <textarea class="exp_text" name="building_excellence_together_content" rows="12"
                  id="gtag">{{!empty($settings) && $settings['building_excellence_together_content'] ? $settings['building_excellence_together_content'] : old('building_excellence_together_content')}}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>
          </form>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection