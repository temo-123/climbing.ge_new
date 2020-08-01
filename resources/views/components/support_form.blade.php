      <button style="margin-top: 15%" data-toggle="modal" data-target="#squarespaceModal_support" class="btn btn-danger dropdown-toggle">Contact To Support</button>
        
        <!-- line modal -->
        <div class="modal fade" id="squarespaceModal_support" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog">
        	<div class="modal-content">
        		<div class="modal-header">
        			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">X</span></button>
        			<h3 class="modal-title" id="lineModalLabel">Send message to support</h3>
        		</div>
        		<div class="modal-body">
        			
                      <form action="{{url('message')}}" method="post" id="js_form">
                @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Your email address</label>
                        <p>enter your mail so that we can contact you</p>
                        <input type="email" name="email" class="form-control textarea" placeholder="E_mail"><br>
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputEmail1">Describe problem</label>
                        <p>Please describe your problem in as much detail as possible.</p>
                        <textarea rows="14" name="msg" id="msg" placeholder="Your message" class="form-control textarea"></textarea>
                      </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group form_left">
                                    <div class="g-recaptcha" data-sitekey="6LfV980UAAAAAFSMmbkzVw1J_-Q2cDroTJoBD9k1"></div>
                                </div>
                            </div>
                        </div>

                      <button type="submit">Send</button>
                  </form>
        
        		</div>
        		<div class="modal-footer">
        		</div>
        	</div>
          </div>
        </div>


