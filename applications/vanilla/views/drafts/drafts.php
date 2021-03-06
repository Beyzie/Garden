<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();
$ShowOptions = TRUE;
$Alt = '';
foreach ($this->DraftData->Result() as $Draft) {
   $EditUrl = !is_numeric($Draft->DiscussionID) || $Draft->DiscussionID <= 0 ? '/post/editdiscussion/0/'.$Draft->DraftID : '/post/editcomment/0/'.$Draft->DraftID;
   $Alt = $Alt == ' Alt' ? '' : ' Alt';
   ?>
   <li class="<?php echo 'DiscussionRow Draft'.$Alt; ?>">
      <ul>
         <li class="Title">
            <?php
               echo Anchor('Delete', 'vanilla/drafts/delete/'.$Draft->DraftID.'/'.$Session->TransientKey().'?Target='.urlencode($this->SelfUrl), 'DeleteDraft');
            ?>
            <h3><?php
               echo Anchor($Draft->Name, $EditUrl, 'DraftLink');
            ?></h3>
            <?php
               echo Anchor(SliceString(Format::Text($Draft->Body), 200), $EditUrl, 'DraftCommentLink');
            ?>
         </li>
      </ul>
   </li>
   <?php
}