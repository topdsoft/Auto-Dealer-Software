<?php
    echo $this->Session->flash('auth');
    echo $this->Form->create('User', array('action' => 'login'));
    echo $this->Form->input('username',array('id'=>'un'));
    echo $this->Form->input('password');
    echo $this->Form->end('Login');
?>
<script type='text/javascript'>document.getElementById('un').focus();</script>
