<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 512px;
  position: absolute;
  top: 50%;
  left: 50%;
  margin-left: -250px;
  margin-top: -190px;
}

.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: url('https://developer.github.com/images/header-animation-short-loop.gif') right / cover;
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>

<div class="demo-card-wide mdl-card mdl-shadow--2dp">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text">Code<strong>Review</strong></h2>
  </div>
  <div class="mdl-card__supporting-text">
    A simple platform for rockstar codereview using Github.
  </div>
  <div class="mdl-card__actions mdl-card--border">
    <a href="<?php echo base_url();?>/home/login" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
      Login with Github
    </a>
  </div>
  <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
      <i class="material-icons">share</i>
    </button>
  </div>
</div>