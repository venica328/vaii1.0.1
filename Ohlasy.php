<?php




echo '
<div class="container">
  <div class="chat-container">
    <div class="message">
      <div class="datetime">23/10/2020 16:40</div>
      <div class="name">VEJKA</div>
      <div style="padding: 1px 0px 30px 41px;margin: 30px 5px 5px -37px;">A message text</div>
    </div>
  </div>
  
  
  <div class="chat-container">
    <div class="message">
    <?php foreach ($storage->Load() as $user) { ?>
      <div class="datetime"> <h3> <?php echo $user->getDate() ?> </h3></div>
      <div class="name"> <?php echo $user->getNick() ?></div>
      <div style="padding: 1px 0px 30px 41px;margin: 30px 5px 5px -37px;"><?php echo $user->getText() ?></div>
      <?php } ?>
    </div>
  </div>
  
  <form method="post">
      <form class="send-message-form">
        <input type="text" name="nick" placeholder="NICK">
        <input type="text" name="text" placeholder="Komentár">
        <button type="submit" class="text-button">SEND</button>
      </form>
  </form>
</div>'
?>
