<td>
  <ul class="sf_admin_td_actions">
  <?php if ($account->getBanned()): ?>
    <li class="sf_admin_action_unban">
      <?php echo link_to(__('Unban', array(), 'messages'), 'account/ListUnban?id='.$account->getId(), array()) ?>
    </li>
  <?php else: ?>
    <li class="sf_admin_action_ban">
      <?php echo link_to(__('Ban', array(), 'messages'), 'account/ListBan?id='.$account->getId(), array()) ?>
    </li>
  <?php endif ?>
    <?php echo $helper->linkToEdit($account, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($account, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
