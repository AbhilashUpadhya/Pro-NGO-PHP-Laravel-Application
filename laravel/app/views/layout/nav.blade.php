@if(Auth::check())
<a href="{{URL::route('account-logout')}}" class="another" style="float: right; font-size: 12px;margin-top: 16px;">Log out</a>

<a href="{{URL::route('account-change-pass')}}" class="another" style="
    float: right;
    margin-right: 10px;
    font-size: 12px;
    margin-top: 16px;
">Change Password</a>



<span  class="another" style="
   font-size: 12px;
    position: absolute;
    right: 64px;">
    Hello {{ Auth::user()->username }} !!</span>
@else

<a href="{{ URL::route('account-create') }}" class="another" style="
    float: right;
    font-size: medium;
    margin-top:10px;
">sign up</a>
<a href="{{ URL::route('account-login') }}" class="another" style="
    float: right;
    margin-right: 10px;
    font-size: medium;
     margin-top:10px;
">Login</a>
@endif