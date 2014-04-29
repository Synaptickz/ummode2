<div class="container">
<p>{{ content() }}</p>
<ul>
{% for error in errors %}
    <li><p class="bg-danger">{{ error.getMessage() }}</p></li>
{% endfor %}
</ul>

<form action="/account/login" method="post">
<div class="input-group">
  <span class="input-group-addon">Username</span>
  <input name="username" type="text" class="form-control" value="{{ username }}" placeholder="Batman">
</div>
<br />
<div class="input-group">
  <span class="input-group-addon">Password</span>
  <input name="password" type="password" class="form-control" value="{{ password }}" placeholder="Your Password">
</div>
<br />
<div class="input-group">
  <input type="submit" class="form-control">
</div>
<input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
        value="<?php echo $this->security->getToken() ?>"/>
</form>

</div>
