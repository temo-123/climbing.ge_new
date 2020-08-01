@if(isset($comments))

    <div class="span3 well">
        <center>
        <a href="#aboutModal" data-toggle="modal" data-target="#comments_form">
        <h3>Add New Comment</h3>
        </a>
        </center>
    </div>   

    <!-- Modal -->
    <div class="modal fade" id="comments_form" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">More About Joe</h4>
                    </div>
                <div class="modal-body">
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <form action="{{ route('comments', array('article_id'=>$article->id, 'action'=>'add')) }}" id="js_form" class="contact-form" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="container">
        <div class="row">
            <div class='col-sm-12'>
                
                <div class="row">
                    <div class="col-md-12">
                        <h2 id='comments'>Comments</h2>
                        <p>Incorrect comments or comments containing obscene language will be deleted.</p>
                    </div>
                </div>
                        
                <select class="form-control" name="article"  style="display: none;">
                    <option value="{!! $article->title !!}">{!! $article->title !!}</option>
                </select>
                
                @if (Auth::guest())
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="name" name="name" class="form-control textarea" placeholder="Name"><br>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="surname" name="surname" class="form-control textarea" placeholder="Surname"><br>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control textarea" placeholder="E_mail"><br>
                        </div>
                    </div>
                </div>
                @else
                <div style='display: none;'>
                    <input type="name" value="{{Auth::user()->name}}" name="name" autocomplete="off" id="name" placeholder="Name">
                    <input type="surname" value="{{Auth::user()->surname}}" name="surname" autocomplete="off" id="surname" placeholder="Surname">
                    <input type="email" value="{{Auth::user()->email}}" name="email" autocomplete="off" id="email" placeholder="E-mail">
                </div>
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea rows="6" name="text" id="text" maxlength="500" placeholder="Your comment (Write comments only in English, no more than 500 characters!)" class="form-control textarea"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form_left">
                            <div class="g-recaptcha" data-sitekey="6LfV980UAAAAAFSMmbkzVw1J_-Q2cDroTJoBD9k1"></div>
                        </div>
                    </div>
                </div>
                
                <div class='row'>
                    <div class="col-md-12">
                        <button type="submit" class="btn main-btn pull-right">Send Comment</button>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    </form>
                </div>
                <div class="modal-footer">
                    <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">I've heard enough about Joe</button>
                    </center>
                </div>
            </div>
        </div>
    </div>











 





@endif
