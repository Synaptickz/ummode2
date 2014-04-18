<div class="container">
<pre>{{ _(hi_user,username) }}</pre>
<pre>{{ content() }}</pre>
<form action="/signup" method="post">
<div class="input-group">
  <span class="input-group-addon">Username</span>
  <input name="username" type="text" class="form-control" placeholder="Batman">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">Email</span>
  <input name="email" type="text" class="form-control" placeholder="batman@gotham.com">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">Password</span>
  <input name="password" type="password" class="form-control" placeholder="Your Password">
</div>
<br />
<div class="input-group">
  <input type="submit" class="form-control" placeholder="Your Password">
</div>
</form>

</div>
