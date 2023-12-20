 {{-- profile css --}}
 <link rel="stylesheet" href="{{ asset('profilecss/profile.css') }}">
 {{-- profile css --}}
 <div class="container-user-post-notification {{ session('isPending') ? 'showAlert' : '' }}">
     <div class="user-post-status-success">
         <div class="exit-user-post-alert-btn">
             <i class="fa-solid fa-xmark"></i>
         </div>
         <img class="img-alert" src="{{ asset('img/logo.svg') }}" alt="">
         <p>
             New post created successfully !
             <br>
             Please wait a few minutes for Admin to censored.
         </p>
     </div>
 </div>
 <div class="modal-user-post-1">
     <div class="modal_inner-post">
         <div class="post-header">

             <div class="close-icon">
                 <div>
                     <i class="fa-solid fa-xmark"></i>
                 </div>
             </div>

             <div class="post-header-title">
                 <h1>New Post</h1>
             </div>
         </div>
         <div class="post-uset-body">
             <a href='#' class="avatar-user-post">
                 @php
                     $check = false;
                 @endphp
                 @foreach ($user as $item)
                     @if (!$check)
                         @if (auth()->user()->id == $item->id && $item->avatar != null)
                             <img src="{{ asset($item->avatar) }}" alt="" width="50"
                                 style=" width: 80px;clip-path: circle(30%);">
                             @php
                                 $check = true;
                             @endphp
                         @elseif (auth()->user()->id == $item->id && $item->avatar == null)
                             <img src="{{ asset('img/humanicon.png') }}" alt="" width="50"
                                 style=" width: 80px;clip-path: circle(30%);">
                             @php
                                 $check = true;
                             @endphp
                         @endif
                     @endif
                 @endforeach
             </a>
             <div class="user-name-post">
                 @if (session('userInfo'))
                     <p>{{ session('userInfo')['name'] }}</p>
                 @endif
             </div>

         </div>
         <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
             @csrf
             <div class="input-post-content">
                 <textarea name="title" id="" placeholder="Write post"></textarea>
             </div>
             <div class="user-post-image">
                 <input type="file" multiple name="image[]">
             </div>
             <div class="submit-post">
                 <button type="submit" class="btn btn-primary">Submit</button>
             </div>

         </form>
     </div>
 </div>
