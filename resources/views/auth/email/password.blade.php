<p>click here toe reset password</p>
<a href="{{ $link = url('password/reset' ,$token).'?email='.urlencode( $user ->getEmailForPasswordRest() ) }}">abc</a>