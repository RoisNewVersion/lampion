@extends('layout.layoutuser.default')
@section('isi')
	<div id="all">

        <div id="content">
            <div class="container">
            <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="box">
                    
                    	@if(Session::has('pesan'))
	                    	<div class="alert alert-success">
	                    		<button type="button" class="close" data-dismiss="alert">&times;</button>
	                    		<strong>{!! Session::get('pesan', 'default');!!}</strong> 
	                    	</div>
                    	@endif
                        
                        <div class="login-form">
                        <h2>Login</h2>
                        <form action="{{url('login')}}" method="post">
                        	{!!csrf_field()!!}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required="required" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password"  id="password" required="required">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@stop()