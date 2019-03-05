  @extends('main')

  @section('title', '| Contact')

  @section('content')

    <div class="row">
      <div class="col-md-12">
        <h2 class="text-center login-header">CONTACT THE ADMIN</h2>
        <form action="{{ url('contact') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                <label name="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
                </div> 

                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" class="form-control">
                </div>
            </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label name="message">Message:</label>
                        <textarea id="message" name="message" rows="5" class="form-control">Type your message hear..
                        </textarea>
                    </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-bottom: 10px">

                               <input type="submit" value="Send Message" class="btn btn-xs btn-primary pull-right btn-block">
                           </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                </div>
            </div>
            
        </form>
      </div>
    </div>


    @endsection
 
