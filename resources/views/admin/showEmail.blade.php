@extends('admin.layout')
@section('content')
<style>
body{margin-top:20px;}

    .chat-online {
        color: #34ce57
    }
    
    .chat-offline {
        color: #e4606d
    }
    
    .chat-messages {
        display: flex;
        flex-direction: column;
        max-height: 800px;
        overflow-y: scroll
    }
    
    .chat-message-left,
    .chat-message-right {
        display: flex;
        flex-shrink: 0
    }
    
    .chat-message-left {
        margin-right: auto
    }
    
    .chat-message-right {
        flex-direction: row-reverse;
        margin-left: auto
    }
    .py-3 {
        padding-top: 1rem!important;
        padding-bottom: 1rem!important;
    }
    .px-4 {
        padding-right: 1.5rem!important;
        padding-left: 1.5rem!important;
    }
    .flex-grow-0 {
        flex-grow: 0!important;
    }
    .border-top {
        border-top: 1px solid #dee2e6!important;
    }
    .chat-message-left .bg-light{
        color:black;
        background-color: rgb(192 205 221) !important;
    }

    .chat-message-right .bg-light{
        color:black;
        background-color: rgb(9 71 132) !important;
    }
    

</style>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<main class="content">
    <div class="container p-0">

		<h1 class="h3 mb-3">Messages</h1>

		<div class="card">
			<div class="row g-0">
				<div class="col-12 col-lg-12 col-xl-12">
					<div class="py-2 px-4 border-bottom d-none d-lg-block">
						<div class="d-flex align-items-center py-1">
							<div class="position-relative">
								<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
							</div>
							<div class="flex-grow-1 pl-3">
								<strong>{{$Emails[0]->name}}</strong>
							</div>
						</div>
					</div>

					<div class="position-relative">
						<div class="chat-messages p-4">
                        @foreach ($Emails as $item)
                        @if($item->email!=env('MAIL_USERNAME'))
                            <div class="chat-message-left pb-4">
								<div>

									<img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
									<div class="font-weight-bold mb-1">{{$item->name}}</div>
									{{$item->message}}
                                    <div class="text-muted small text-nowrap mt-2">{{$item->created_at}}</div>

								</div>

							</div>
                        @else
							<div class="chat-message-right pb-4">
								<div>
									<img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
								</div>
								<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
									<div class="font-weight-bold mb-1">You</div>
									{{$item->message}}
                                    <div class="text-muted small text-nowrap mt-2">{{$item->created_at}}</div>

								</div>
							</div>
                        @endif
                        @endforeach
							
						</div>
					</div>
                    <form  id="emailForm" action="{{url("sendEmail")}}" class="contact-form" method="post">
                        @csrf
					<div class="flex-grow-0 py-3 px-4 border-top">
						<div class="input-group">
							<input type="text" class="form-control" name="message" placeholder="Type your message">
							<input type="hidden" name="name"    value="{{Auth::user()->name}}">
                            <input type="hidden" name="email"   value="{{env('MAIL_USERNAME')}}">
                            <input type="hidden" name="subject" value="{{$item->subject}}">
                            <input type="hidden" name="chat"    value="{{$item->chat}}">
                            <button class="btn btn-primary">Send</button>
						</div>
					</div>
                </form>
			</div>
			</div>
		</div>
	</div>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        @if (session()->has('formData'))
            // Automatically submit the form if formData is present in the session
            document.getElementById('emailForm').submit();
        @endif
    });
</script>
@endsection