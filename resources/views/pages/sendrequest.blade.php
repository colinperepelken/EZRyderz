@section('content')

<head lang = "en">
  <meta charset = "utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
  <link rel="stylesheet" href="<?php echo asset('css/all.css')?>" type="text/css">
  <title>Send Request</title>
</head>


<!-- HTML Form-->
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form method="post">
     <div class="form-group ">
      <label class="control-label requiredField" for="subject">
       Subject
       <span class="asteriskField">
        *
       </span>
      </label>
      <input class="form-control" id="subject" name="subject" type="text"/>
     </div>
     <div class="form-group ">
      <label class="control-label " for="message">
       Message
      </label>
      <textarea class="form-control" cols="40" id="message" name="message" rows="10"></textarea>
      <span class="help-block" id="hint_message">
       Message sent to driver
      </span>
     </div>
     <div class="form-group" id="div_checkbox">
      <label class="control-label requiredField" for="checkbox">
       Send Schedule Information?
       <span class="asteriskField">
        *
       </span>
      </label>
      <div class=" ">
       <label class="checkbox-inline">
        <input name="checkbox" type="checkbox" value="Yes"/>
        Yes
       </label>
       <label class="checkbox-inline">
        <input name="checkbox" type="checkbox" value="No"/>
        No
       </label>
       <span class="help-block" id="hint_checkbox">
        Checking yes will send the information you have included in your schedule (Time + Location)
       </span>
      </div>
     </div>
     <div class="form-group">
      <div>
       <button class="btn btn-primary " name="submit" type="submit">
        Submit
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
@endsection

